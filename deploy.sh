#!/bin/bash

# ============================================================
# Maylancer Films — Deployment Script
# ============================================================
# Usage:
#   First deploy:  bash deploy.sh --fresh
#   Updates:       bash deploy.sh
# ============================================================

set -e

BOLD="\033[1m"
GREEN="\033[0;32m"
YELLOW="\033[0;33m"
RED="\033[0;31m"
NC="\033[0m"

log()  { echo -e "${GREEN}${BOLD}[✓]${NC} $1"; }
warn() { echo -e "${YELLOW}${BOLD}[!]${NC} $1"; }
fail() { echo -e "${RED}${BOLD}[✗]${NC} $1"; exit 1; }

FRESH=false
if [[ "$1" == "--fresh" ]]; then
    FRESH=true
fi

echo ""
echo -e "${BOLD}============================================${NC}"
echo -e "${BOLD}  Maylancer Films — Deploying...${NC}"
echo -e "${BOLD}============================================${NC}"
echo ""

# ── Pre-flight checks ──
command -v php >/dev/null 2>&1    || fail "PHP is not installed"
command -v composer >/dev/null 2>&1 || fail "Composer is not installed"
command -v node >/dev/null 2>&1   || fail "Node.js is not installed"
command -v npm >/dev/null 2>&1    || fail "NPM is not installed"

# ── Check Node.js version (Vite 7 requires Node 20.19+ or 22.12+) ──
NODE_MAJOR=$(node -v | cut -d. -f1 | tr -d 'v')
if [ "$NODE_MAJOR" -lt 20 ]; then
    fail "Node.js v$(node -v) detected. Vite requires Node.js 20.19+ or 22.12+. Please upgrade."
fi
log "Node.js $(node -v) OK"

# ── Check .env exists ──
if [ ! -f .env ]; then
    if [ -f .env.example ]; then
        cp .env.example .env
        warn "Created .env from .env.example — please update with production values"
    else
        fail ".env file not found and no .env.example to copy from"
    fi
fi

# ── Maintenance mode on ──
if [ "$FRESH" = false ]; then
    php artisan down --retry=30 2>/dev/null || true
    log "Maintenance mode enabled"
fi

# ── Pull latest code (if git repo) ──
if [ -d .git ]; then
    git pull origin main 2>/dev/null && log "Pulled latest code" || warn "Git pull skipped"
fi

# ── Install PHP dependencies ──
composer install --no-dev --optimize-autoloader --no-interaction
log "Composer dependencies installed"

# ── Install Node dependencies & build assets ──
npm ci --no-audit --no-fund
log "NPM dependencies installed"

npm run build
log "Assets built"

# ── Generate app key (only if not set) ──
APP_KEY=$(grep "^APP_KEY=" .env | cut -d '=' -f2)
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "" ]; then
    php artisan key:generate --force
    log "Application key generated"
else
    log "Application key already set"
fi

# ── Run migrations ──
if [ "$FRESH" = true ]; then
    php artisan migrate:fresh --force
    log "Database migrated (fresh)"
else
    php artisan migrate --force
    log "Database migrated"
fi

# ── Run seeders (fresh deploy only) ──
if [ "$FRESH" = true ]; then
    php artisan db:seed --force
    log "Database seeded"
fi

# ── Storage link ──
if [ ! -L public/storage ]; then
    php artisan storage:link
    log "Storage symlink created"
else
    log "Storage symlink already exists"
fi

# ── Cache optimization ──
php artisan config:cache
log "Config cached"

php artisan route:cache
log "Routes cached"

php artisan view:cache
log "Views cached"

php artisan event:cache
log "Events cached"

php artisan icons:cache 2>/dev/null && log "Icons cached" || true

# ── Clear old caches ──
php artisan cache:clear
log "Application cache cleared"

# ── Filament assets ──
php artisan filament:assets
log "Filament assets published"

# ── Set permissions ──
chmod -R 775 storage bootstrap/cache 2>/dev/null || true
log "Permissions set on storage & bootstrap/cache"

# ── Maintenance mode off ──
php artisan up 2>/dev/null || true
log "Maintenance mode disabled"

echo ""
echo -e "${GREEN}${BOLD}============================================${NC}"
echo -e "${GREEN}${BOLD}  Deployment complete!${NC}"
echo -e "${GREEN}${BOLD}============================================${NC}"
echo ""

if [ "$FRESH" = true ]; then
    echo -e "${YELLOW}${BOLD}Post-deploy checklist:${NC}"
    echo "  1. Update .env with production DB, mail, and app URL"
    echo "  2. Create admin user:  php artisan db:seed --class=AdminUserSeeder"
    echo "  3. Set APP_DEBUG=false and APP_ENV=production in .env"
    echo "  4. Configure your web server (Nginx/Apache) to point to /public"
    echo "  5. Set up SSL certificate"
    echo "  6. Configure queue worker:  php artisan queue:work --daemon"
    echo "  7. Set up cron for scheduler:  * * * * * php artisan schedule:run"
    echo ""
fi
