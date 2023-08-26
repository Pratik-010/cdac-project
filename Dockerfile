<<<<<<< HEAD
FROM python
RUN pip install flask
WORKDIR /src
COPY . .
EXPOSE 4000
CMD python application.py
=======
FROM php:7.0-apache
WORKDIR /var/www/html
COPY . /var/www/html
EXPOSE 80

>>>>>>> d907aa892a7d79e132fd6067af69b589146e991e
