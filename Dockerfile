FROM php:8.0-apache
WORKDIR /var/www/html
COPY . .
EXPOSE 80

RUN docker-php-ext-install mysqli
