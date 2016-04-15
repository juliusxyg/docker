
cd ~/workspace/docker/images
docker-compose up -d --remove-orphans

http://docker.lab/


#######
ERROR: Couldn't connect to Docker daemon - you might need to run `docker-machine start default`.

~: docker-machine restart default
~: eval $(docker-machine env default)
#######