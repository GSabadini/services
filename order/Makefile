up:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

build:
	docker-compose build

bash:
	docker exec -it app-order bash

sniffer:
	docker exec -it app-order ./vendor/bin/phpcbf src/

stan:
	docker exec -it app-order vendor/bin/phpstan analyse
##https://phpstan.org/user-guide/rule-levels
