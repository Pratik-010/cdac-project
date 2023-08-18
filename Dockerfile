FROM php:7.0-apache
WORKDIR /var/www/index.html
COPY . .
EXPOSE 80

