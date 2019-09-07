FROM php:7.2-apache

COPY ./ /srv/app
COPY vhosts.conf /etc/apache2/sites-available/000-default.conf

RUN docker-php-ext-install pdo_mysql bcmath

RUN apt-get install -y openssl

RUN chown -R www-data:www-data /srv/app && a2enmod rewrite
