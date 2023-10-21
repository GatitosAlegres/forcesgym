ARG PHP_FPM_VERSION=8.2
ARG NODEJS_VERSION=lts-alpine3.18
ARG NGINX_VERSION=alpine3.18

ARG PHP_EXTS='bcmath ctype fileinfo mbstring pdo pdo_pgsql pdo_mysql pgsql mysqli dom pcntl exif gd zip'

ARG USER=forcesuser
ARG USER_ID=1000

ARG APP_NAME=forces_gym

# -------------------------- FPM - STAGING --------------------------

FROM php:${PHP_FPM_VERSION}-fpm as fpm

ARG PHP_FPM_VERSION
ARG PHP_EXTS
ARG USER
ARG USER_ID
ARG APP_NAME
ARG APP_DEBUG = false

WORKDIR /opt/apps/${APP_NAME}

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libzip-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install ${PHP_EXTS}

COPY --from=composer:lts /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $USER_ID -d /home/$USER $USER
RUN mkdir -p /home/$USER/.composer && \
    chown -R $USER:$USER /home/$USER && \
    chown -R www-data:www-data /opt/apps/${APP_NAME}

COPY --chown=www-data:www-data .env.example .env

COPY --chown=www-data:www-data . .

RUN composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader

RUN php artisan key:generate

RUN php artisan event:cache && \
    php artisan route:cache && \
    php artisan view:cache

USER www-data


# -------------------------- FRONTEND - STAGING --------------------------

FROM node:${NODEJS_VERSION} as frontend

ARG APP_NAME

WORKDIR /opt/apps/${APP_NAME}

COPY --from=fpm /opt/apps/${APP_NAME} /opt/apps/${APP_NAME}

RUN npm install && npm run build


# -------------------------- WEB - STAGING --------------------------

FROM nginx:${NGINX_VERSION} as web

ARG APP_NAME
ARG FPM_HOST

WORKDIR /opt/apps/${APP_NAME}

COPY ./infraestructure/nginx/nginx.conf /etc/nginx/templates/default.conf.template

COPY --from=frontend /opt/apps/${APP_NAME}/public /opt/apps/${APP_NAME}/public