
FROM php:7.3.6-fpm-alpine3.9

RUN apk add --no-cache openssl bash mysql-client nodejs npm git
RUN docker-php-ext-install pdo pdo_mysql

RUN apk add --no-cache tzdata
ENV TZ America/Sao_Paulo

RUN echo 'memory_limit = -1' >> /usr/local/etc/php/php.ini

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN apk add --no-cache $PHPIZE_DEPS \
	&& pecl install xdebug-2.9.0 \
	&& docker-php-ext-enable xdebug

WORKDIR /var/www
RUN rm -rf /var/www/html

COPY . /var/www
RUN ln -s public html

EXPOSE 9000
