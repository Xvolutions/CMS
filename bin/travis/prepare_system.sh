#!/bin/sh

# TEMP get latests version of composer which is faster
composer self-update

# Install needed packages
echo "> Installing needed packages";
sudo apt-get update

# Create database
echo "> Create database and grant premissions to user 'symfony'"
mysql -uroot -e "CREATE DATABASE IF NOT EXISTS symfony; GRANT ALL ON symfony.* TO symfony@localhost IDENTIFIED BY 'symfony';"