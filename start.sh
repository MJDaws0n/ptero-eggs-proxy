#!/bin/ash
rm -rf /home/container/tmp/*

if [ -z "$1" ]; then
    echo "Error: No domain provided! Please provide one."
else
    # Update the 15th line of ./proxymanage.php with the provided domain
    sed -i "15s/.*/\$DOMAIN = '$1';/" ./proxymanage.php

    echo "⟳ Updateding composer modules"
    composer install --working-dir=/home/container/webroot

    echo "⟳ Starting PHP-FPM..."
    /usr/sbin/php-fpm8 --fpm-config /home/container/php-fpm/php-fpm.conf --daemonize

    echo "⟳ Starting Nginx..."
    echo "✓ Successfully started"
    /usr/sbin/nginx -c /home/container/nginx/nginx.conf -p /home/container/
fi
