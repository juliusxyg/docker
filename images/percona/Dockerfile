FROM percona:5.7

# Write Permission
RUN usermod -u 1000 mysql && \
	chown mysql.mysql /var/run/mysqld/ && \
	chown mysql.mysql /etc/mysql/conf.d/

EXPOSE 3306
VOLUME ["/var/lib/mysql", "/etc/mysql/conf.d"]
