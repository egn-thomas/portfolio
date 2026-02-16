FROM php:8.2-apache

# Installer les extensions PHP courantes (si nécessaire)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copier les fichiers du site
COPY . /var/www/html/

# Activer mod_rewrite pour les URLs propres
RUN a2enmod rewrite

# Configuration Apache pour permettre .htaccess
RUN echo '<Directory /var/www/html/>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/docker-php.conf \
    && a2enconf docker-php

# Définir les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exposer le port 80
EXPOSE 80

# Démarrer Apache
CMD ["apache2-foreground"]