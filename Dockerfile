FROM phusion/baseimage:focal-1.1.0

# Generally don't override these
ENV COMPOSER_HOME="/root/.composer" \
    COMPOSER_ALLOW_SUPERUSER=1 \
    PATH="$PATH:/app/vendor/bin:/app:/app/node_modules/.bin" \
    PHP_IDE_CONFIG="serverName=localhost" \
    TERM="xterm-256color"

# Environment variables to be overridden if needed
ENV APP_NAME="elephantbox-app" \
    APP_ENV="production" \
    MY_INIT_COMMAND="my_init --quiet" \
    PHP_FPM_INI_MEMORY_LIMIT="128M" \
    PHP_FPM_INI_OPCACHE_BLACKLIST_FILENAME="" \
    PHP_FPM_INI_POST_MAX_SIZE="10M" \
    PHP_FPM_INI_UPLOAD_MAX_FILESIZE="10M" \
    PHP_FPM_CONF_PM="dynamic" \
    PHP_FPM_CONF_PM_MAX_CHILDREN="5"

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

EXPOSE 80

COPY ./docker /

ENTRYPOINT ["entrypoint"]

CMD ["/bin/true"]

WORKDIR /app
