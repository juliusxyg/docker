FROM nginx:1.9.2

ADD  nginx.conf      /etc/nginx/nginx.conf
ADD  fastcgi_params      /etc/nginx/fastcgi_params
ADD  sites-enabled/*    /etc/nginx/conf.d/
RUN  mkdir /opt/htdocs && mkdir /opt/log && mkdir /opt/log/nginx
RUN  chown -R www-data.www-data /opt/htdocs /opt/log

VOLUME ["/opt"]
