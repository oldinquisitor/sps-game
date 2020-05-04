ARG VERSION=7.4

FROM php:${VERSION}-cli

LABEL maintainer="Oleksandr Nazarov"

WORKDIR /var/www/html

RUN apt-get update && \
    apt-get install --no-install-recommends --assume-yes --quiet \
    curl zip unzip libzip-dev && \
    docker-php-ext-install zip && \
    rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php && \
    mv ./composer.phar /usr/local/bin/composer

COPY . /var/www/html/

CMD ["bash"]