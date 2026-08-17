#!/usr/bin/env bash
#
# Sets the project up and starts it, in one command.
#
#   ./run.sh              set up if needed, then serve on port 8000
#   ./run.sh --port 8080  serve on a different port
#   ./run.sh --fresh      rebuild the database from scratch, then serve
#   ./run.sh --setup      set up only, do not start the server
#
# Uses SQLite so nothing else has to be installed or running. To use MySQL
# instead, edit the DB_ settings in .env and run `php artisan migrate`.

set -euo pipefail
cd "$(dirname "$0")"

PORT=8000
FRESH=0
SETUP_ONLY=0

while [ $# -gt 0 ]; do
  case "$1" in
    --port)     PORT="${2:?--port needs a number}"; shift 2 ;;
    --fresh)    FRESH=1; shift ;;
    --setup)    SETUP_ONLY=1; shift ;;
    -h|--help)  sed -n '3,12p' "$0" | sed 's/^# \{0,1\}//'; exit 0 ;;
    *)          echo "unknown option: $1" >&2; exit 1 ;;
  esac
done

step() { printf '\n\033[1m==> %s\033[0m\n' "$1"; }
fail() { printf '\n\033[31merror:\033[0m %s\n' "$1" >&2; exit 1; }

# --- locate a PHP that meets Laravel 9's requirement -------------------------

# Laravel 9 targets PHP 8.0-8.2. Newer builds run it but emit a wall of
# deprecation notices, so prefer a version this release was written for and
# only fall back to whatever `php` happens to be.
find_php() {
  local candidate
  for candidate in /opt/homebrew/opt/php@8.2/bin/php /usr/local/opt/php@8.2/bin/php \
                   /opt/homebrew/opt/php@8.1/bin/php /usr/local/opt/php@8.1/bin/php \
                   php /opt/homebrew/bin/php /usr/local/bin/php; do
    if command -v "$candidate" >/dev/null 2>&1 &&
       "$candidate" -r 'exit(version_compare(PHP_VERSION, "8.0.2", ">=") ? 0 : 1);' 2>/dev/null; then
      command -v "$candidate"
      return 0
    fi
  done
  return 1
}

PHP_BIN="$(find_php)" || fail "PHP 8.0.2 or newer not found.
Install it with:

    brew install php@8.2

then run this script again."

# Deprecation notices from running an older Laravel on a newer PHP are noise,
# not problems with this project.
PHP=("$PHP_BIN" -d error_reporting='E_ALL & ~E_DEPRECATED')

step "Using $("$PHP_BIN" --version | head -1)"

# --- dependencies ------------------------------------------------------------

if [ ! -d vendor ]; then
  command -v composer >/dev/null 2>&1 || fail "Composer not found.
Install it with:

    brew install composer

then run this script again."

  step "Installing PHP dependencies"
  composer install --no-interaction --no-progress
fi

# --- environment -------------------------------------------------------------

if [ ! -f .env ]; then
  step "Creating .env (SQLite)"
  cp .env.example .env
  # Point at SQLite so no database server is needed.
  sed -i.bak \
    -e 's/^DB_CONNECTION=mysql/DB_CONNECTION=sqlite/' \
    -e 's/^DB_HOST=/# DB_HOST=/' \
    -e 's/^DB_PORT=/# DB_PORT=/' \
    -e 's/^DB_DATABASE=/# DB_DATABASE=/' \
    -e 's/^DB_USERNAME=/# DB_USERNAME=/' \
    -e 's/^DB_PASSWORD=/# DB_PASSWORD=/' \
    .env
  rm -f .env.bak
fi

if ! grep -q '^APP_KEY=base64:' .env; then
  step "Generating application key"
  "${PHP[@]}" artisan key:generate
fi

# --- database ----------------------------------------------------------------

if grep -q '^DB_CONNECTION=sqlite' .env; then
  if [ "$FRESH" = 1 ]; then
    rm -f database/database.sqlite
  fi
  if [ ! -f database/database.sqlite ]; then
    step "Creating database/database.sqlite"
    touch database/database.sqlite
  fi
fi

step "Running migrations"
if [ "$FRESH" = 1 ]; then
  "${PHP[@]}" artisan migrate:fresh --force
else
  "${PHP[@]}" artisan migrate --force
fi

# BookSeeder is a no-op when the table already has rows, so a real catalogue
# is never overwritten.
step "Adding sample books"
"${PHP[@]}" artisan db:seed --class=BookSeeder --force

if [ "$SETUP_ONLY" = 1 ]; then
  step "Setup complete"
  echo "Start it with: ./run.sh"
  exit 0
fi

# --- serve -------------------------------------------------------------------

step "Starting the server"
echo "Open http://127.0.0.1:$PORT — press Ctrl+C to stop."
echo
exec "${PHP[@]}" artisan serve --host=127.0.0.1 --port="$PORT"
