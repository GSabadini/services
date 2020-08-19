DOCKER_EXEC = docker exec -it app-order

configure:
	${DOCKER_EXEC} composer update

init:
	cp .env .env.example

up:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

build:
	docker-compose build

bash:
	${DOCKER_EXEC} bash

sniffer:
	${DOCKER_EXEC} composer sniffer

stan:
	${DOCKER_EXEC} composer stan
##https://phpstan.org/user-guide/rule-levels

mess:
	${DOCKER_EXEC} composer mess

test:
	${DOCKER_EXEC} composer test

code-review: sniffer stan mess test
