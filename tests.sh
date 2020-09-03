#!/usr/bin/env bash

php -S localhost:8888 tests/index.html &
chrome-system-check
vendor/bin/phpunit
