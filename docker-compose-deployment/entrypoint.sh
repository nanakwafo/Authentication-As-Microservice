#!/bin/bash
composer config -g github-oauth.github.com de05b52a4a3e9b133cfd93a6e3c33b4dda90ba50
composer install 
chmod 755 -R ./
exec "$@";