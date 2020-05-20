FROM   php:7.4-fpm


RUN apt-get update && apt-get install -y \
          libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install pdo_mysql

RUN  apt-get install -y git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN  composer config -g github-oauth.github.com de05b52a4a3e9b133cfd93a6e3c33b4dda90ba50
WORKDIR /var/www/html



EXPOSE 9000

CMD bash -c "composer install && chmod 775 -R * && php-fpm"
