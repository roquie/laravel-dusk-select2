#!/usr/bin/env bash

vendor/laravel/dusk/bin/chromedriver-linux &
php -S localhost:8888 tests/index.html &
vendor/bin/phpunit
