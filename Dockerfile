# Extends the official WordPress image only to add Composer, which the plugin
# needs because autoload.php requires vendor/autoload.php (PSR-0 dependencies).
# Everything else (Apache, PHP, WordPress core) comes from the base image.
FROM wordpress:6.5-php8.2-apache

# Composer needs unzip/git to install packages.
RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip \
    && rm -rf /var/lib/apt/lists/*

# Pull the Composer binary straight from the official Composer image.
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
