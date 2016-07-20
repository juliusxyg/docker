
~: cd ~/workspace/docker/images
~: docker-compose up -d --remove-orphans

update /etc/hosts and visit
http://docker.lab/


#######
ERROR: Couldn't connect to Docker daemon - you might need to run `docker-machine start default`.

~: docker-machine restart default
~: eval $(docker-machine env default)
#######


login into mysql bash:
~: docker exec -it images_mysql_1 bash
~: mysql -h 127.0.0.1 -P 3306 -u root -p123456

use docker-machine ip : 192.168.99.100 to connect mysql container from your local mysqlclient


build single image:
~: docker-compose build nginx
restart
~: docker-compose up -d --remove-orphans
