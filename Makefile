IMAGE_NAME=teluino_o_bot

init:
	cd database && sqlite3 telegram.db < teluino.sql

image:
	docker build -t $(IMAGE_NAME) .

login: image
	docker run -it -v `pwd`:/app -p 8095:8095 -w /app $(IMAGE_NAME) bash

fix:
	./vendor/bin/php-cs-fixer --verbose --diff --allow-risky=yes fix

unit:
	./vendor/bin/phpunit --testsuite unit_test

integration:
	./vendor/bin/phpunit --testsuite integration_test

teste: unit integration
