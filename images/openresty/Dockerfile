FROM openresty/openresty:centos

ADD  nginx.conf      /usr/local/openresty/nginx/conf/nginx.conf
ADD  conf.d/*    	 /etc/nginx/conf.d/
RUN  mkdir /www && \
	 mkdir /www/log && \
	 mkdir /www/log/openresty

RUN  groupadd -g 1001 wwwrun && \
     useradd -u 1001 wwwrun -g wwwrun
RUN  chown -R wwwrun.wwwrun /www

EXPOSE 8080

VOLUME ["/www"]
