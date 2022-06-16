FROM nginx
COPY docker/conf/vhost.conf /etc/nginx/nginx.conf
WORKDIR /var/www/lar1
