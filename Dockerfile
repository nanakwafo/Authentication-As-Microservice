FROM  php:7.2-fpm-alpine

RUN docker-php-ext-install pdo_mysql


RUN rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
