test:
	./vendor/bin/phpunit tests

cs:
	./vendor/bin/php-cs-fixer fix

analyse:
	./vendor/bin/phpstan analyse --level 6 src tests

all: cs analyse test

