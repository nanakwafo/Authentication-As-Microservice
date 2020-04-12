FROM  php:7.4-fpm
RUN mkdir /app
#Make sure to copy the src content from the parent into the sub src
COPY src /app    

RUN apt-get update && apt-get install -y \
          libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd


RUN docker-php-ext-install pdo_mysql