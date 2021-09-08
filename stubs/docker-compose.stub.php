version: '3.7'

services:

  web:
    image: elephantbox/phusion-web:latest
    environment:
      APP_NAME: <?= $this->applicationName ?>

      APP_ENV: local
      XDEBUG_CONFIG: remote_enable=1
      PHP_IDE_CONFIG: serverName=localhost
    ports:
      - 8000:80
    volumes:
      - .:/app
    links:
      <?php if ($this->hasMysql): ?>- mysql<?php endif; ?>

      <?php if ($this->hasRedis): ?>- redis<?php endif; ?>

  <?php if ($this->hasMysql): ?>

  mysql:
    image: mysql:8
    command: --default-authentication-plugin=mysql_native_password
    ports:
      - 3306:3306
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: developer
      MYSQL_USER: developer
      MYSQL_PASSWORD: developer
  <?php endif; ?>
  <?php if ($this->hasRedis): ?>

  redis:
    image: redis:latest

  <?php endif; ?>

