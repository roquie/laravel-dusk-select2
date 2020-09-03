composer:
	docker run --rm -it -v $$(pwd):/app -w /app roquie/composer-parallel:1 install

test:
	docker run --rm -it -v $$(pwd):/app -w /app -e CHROME_HEADLESS=true chilio/laravel-dusk-ci:php-7.4 /app/tests.sh
