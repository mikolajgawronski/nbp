#!/usr/bin/env bash

user=`id -u`

docker exec --user $user nbp-laravel.test-1 bash -c "XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-text"

