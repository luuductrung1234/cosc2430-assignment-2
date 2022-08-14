FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
	git \
	curl \
	zip \
	unzip

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd xdebug && \
		install-php-extensions  mysqli

WORKDIR /var/www

COPY ./xdebug.ini "${PHP_INI_DIR}/conf.d"