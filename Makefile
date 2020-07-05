IMAGE_NAME=teluino_o_bot

image:
	docker build -t $(IMAGE_NAME) .

login: image
	docker run -it -v `pwd`:/app -p 8095:8095 -w /app $(IMAGE_NAME) bash

fix:
	./vendor/bin/php-cs-fixer --verbose --diff --allow-risky=yes fix

teste:
	./vendor/bin/phpunit --testsuite unit_test
