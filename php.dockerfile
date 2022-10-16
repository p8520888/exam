FROM php:7.4.11-fpm

# 全域設定
WORKDIR /source

# 安裝環境、安裝工具
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
RUN apt update && apt install unzip && apt clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install bcmath
RUN pecl install redis
RUN docker-php-ext-enable redis
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN apt-get update && \
 apt-get install -y \
    nodejs npm

RUN curl -fsSL https://deb.nodesource.com/setup_current.x | bash - && \
 apt-get install -y nodejs
