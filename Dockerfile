FROM php:7.0-apache
WORKDIR /src 
COPY . .
EXPOSE 80

