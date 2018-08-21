#!/bin/bash

docker exec -ti images_percona_slave_1 \
	'mysql' -uroot -p123456 \
	-e"SHOW SLAVE STATUS \G;" \
	-vvv