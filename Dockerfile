## First stage. Copy project files and run composer
FROM composer:2 as composer_stage

RUN rm -rf /var/www && mkdir -p /var/www/html
WORKDIR /var/www/html

COPY composer.json composer.lock ./
COPY public public/

RUN composer install --ignore-platform-reqs --prefer-dist --no-scripts --no-progress --no-suggest --no-interaction --no-dev --no-autoloader

#RUN composer dump-autoload --optimize --apcu --no-dev

COPY bin bin/
COPY config config/
COPY src src/
RUN composer run-script $NODEV post-install-cmd; \
    chmod +x bin/console;


FROM node:16 as npm_builder

COPY --from=composer_stage /var/www/html /var/www/html

WORKDIR /var/www/html
COPY yarn.lock package.json webpack.config.js ./
COPY assets ./assets

RUN yarn install
RUN yarn encore prod

# Especifica uma das imagens utilizadas
FROM wyveo/nginx-php-fpm:php81


# Define o diretório principal do container como o diretório do Nginx
WORKDIR /usr/share/nginx/

# Troca a configuração padrão do Nginx pela nossa

COPY ./.docker/nginx/default.conf  /etc/nginx/conf.d/default.conf

