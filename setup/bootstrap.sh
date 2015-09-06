#!/bin/bash

sudo apt-get update
sudo apt-get -y install nginx
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
sudo apt-get -y install mysql-server
sudo apt-get -y install php5-fpm php5-mysql

mysql -u root --password=root -e "CREATE DATABASE IF NOT EXISTS wordpress"

sudo cp /vagrant/setup/nginx/nginx.conf /etc/nginx/nginx.conf
sudo cp /vagrant/setup/nginx/default /etc/nginx/sites-available/default
sudo service nginx restart
