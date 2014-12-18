#!/bin/sh

echo "Preparing parameters.yml"
cp xvolutionscms/config/parameters.yml.dist xvolutonscoms/config/parameters.yml
sed -i 's/database_user:     root/database_user:     symfony/g'
sed -i 's/database_password: ~/database_password: symfony/g'

echo "Install dependencies through composer"
composer install

echo 'Droping the database'
php xvolutionscms/console doctrine:database:drop --force

echo 'Creating the database'
php xvolutionscms/console doctrine:database:create

echo 'Creating the schema'
php xvolutionscms/console doctrine:schema:create