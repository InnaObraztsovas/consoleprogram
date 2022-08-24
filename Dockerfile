FROM php:8.1

COPY . /var/www/html
WORKDIR /var/www/html
CMD [ "php", "./index.php" ]