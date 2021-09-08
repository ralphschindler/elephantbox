FROM phusion/baseimage:master-amd64

EXPOSE 80

ENV PATH="$PATH:/app/vendor/bin:/app/node_modules/.bin:/app" \
  TERM="xterm-256color" \
  COMPOSER_ALLOW_SUPERUSER="1" \
  PHP_MEMORY_LIMIT="256M" \
  APP_ENV="production" \
  APP_NAME="elephantbox-app"

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
  && apt-add-repository -y ppa:ondrej/php \
  && install_clean \
    git \
    libpng-dev \
    mysql-client \
    nano \
    nginx \
    nodejs \
    php8.0-cli \
    php8.0-xdebug \
    php8.0-common \
    php8.0-fpm \
    php8.0-zip \
    php8.0-mbstring \
    php8.0-mysql \
    php8.0-imagick \
    php8.0-gd \
    php8.0-curl \
    php8.0-pgsql \
    php8.0-xml \
    php8.0-sqlite \
    php8.0-pgsql \
    php8.0-bcmath \
    php8.0-soap \
    php8.0-intl \
    php8.0-redis \
    tzdata \
    unzip \
  && rm /etc/php/8.0/*/conf.d/20-xdebug.ini \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ /

ENTRYPOINT ["entrypoint"]

CMD ["/bin/true"]

WORKDIR /app
