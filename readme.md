# Elephantbox: Production Grade PHP + Node Based On Phusion

Elephantbox is a Docker image for running containerized PHP applications. It follows the
Docker philosophy of organizing an application as **logical services** and as such, the `web`
image will run nginx + php-fpm to expose your web application. Node JS is available for the
purpose of building web assets for your PHP applications.

Elephantbox in either a `docker-compose` context or a `Dockerfile` context as:

- a development time runnable image
- a production time image
- a parent image

## Quick install and run:

```
composer require elephantbox/elephantbox
elephantbox init --with-docker-compose=mysql,redis
```

```
docker-compose up -d
```
