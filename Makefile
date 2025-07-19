install:
	composer install

brain-games:
	./bin/brain-games

validate:
	composer validate

code-sniffer:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
