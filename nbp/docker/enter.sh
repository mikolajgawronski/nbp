#!/usr/bin/env bash

user=`id -u`

docker exec -it --user $user nbp-laravel.test-1 /bin/bash
