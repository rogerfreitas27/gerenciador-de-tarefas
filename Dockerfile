
# Especifica uma das imagens utilizadas
FROM wyveo/nginx-php-fpm:php81


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Define o diretório principal do container como o diretório do Nginx
WORKDIR /usr/share/nginx/

# Troca a configuração padrão do Nginx pela nossa

COPY ./.docker/nginx/default.conf  /etc/nginx/conf.d/default.conf

