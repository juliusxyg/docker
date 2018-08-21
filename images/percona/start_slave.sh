#!/bin/bash

docker exec -ti images_percona_slave_1 \
	'mysql' -uroot -p123456 \
	-e'change master to master_host="10.0.0.21",master_user="repl",master_password="slavepass",master_log_file="581dbd07f14c-bin.000001",master_log_pos=4023;' \
	-vvv

docker exec -ti images_percona_slave_1 \
	'mysql' -uroot -p123456 -e"START SLAVE;" \
	-vvv 