FROM nginx:alpine

# Удаляем дефолтный конфиг, если он есть
RUN rm -f /etc/nginx/conf.d/default.conf

# Копируем конфиги внутрь образа
COPY php-fpm.conf /etc/nginx/conf.d/php-fpm.conf
COPY octane.conf /etc/nginx/conf.d/octane.conf
RUN ln -s /etc/nginx/conf.d/php-fpm.conf /etc/nginx/conf.d/default.conf
