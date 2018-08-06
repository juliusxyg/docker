FROM nginx:1.13

ADD  nginx.conf      /etc/nginx/nginx.conf
ADD  fastcgi_params  /etc/nginx/fastcgi_params
ADD  vhosts/*    	 /etc/nginx/conf.d/vhosts/
ADD  certs/*  	 	 /etc/nginx/certs/
RUN  mkdir /www && \
	 mkdir /www/log && \
	 mkdir /www/log/nginx
RUN  chown -R www-data.www-data /www

EXPOSE 80

VOLUME ["/www"]
