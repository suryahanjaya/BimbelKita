#!/bin/bash

# Create storage symlink if it doesn't exist
php artisan storage:link

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Set proper permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache 