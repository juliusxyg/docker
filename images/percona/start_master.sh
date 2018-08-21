#!/bin/bash

docker exec -ti images_percona_master_1 \
	'mysql' -uroot -p123456 \
	-e"GRANT REPLICATION SLAVE ON *.* TO repl@'%' IDENTIFIED BY 'slavepass' \G;" \
	-vvv

docker exec -ti images_percona_master_1 \
	'mysql' -uroot -p123456 \
	-e"SHOW MASTER STATUS \G;" \
	-vvv
	
#####
# get log file, get log pos in the result
# add them to the start slave shell
#####