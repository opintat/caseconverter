test:
	./vendor/bin/phpunit --colors=always --coverage-html coverage tests

cs:
	./vendor/bin/php-cs-fixer fix

analyse:
	./vendor/bin/phpstan analyse --level 8 src tests

all: cs analyse test

insights:
	docker run -it --rm -v $(shell pwd):/app nunomaduro/phpinsights
