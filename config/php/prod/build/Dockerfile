FROM php:7.1-fpm
WORKDIR /www
ARG USER_ID=0
ENV PARENT_USER ${USER_ID}

# Install developer dependencies
RUN set -xe \
    && apt-get update -yqq \
    && DEBIAN_FRONTEND=noninteractive apt-get install -yqq \
                            git \
                            libsqlite3-dev \
                            libxml2-dev \
                            libicu-dev \
                            libfreetype6-dev \
                            libmcrypt-dev \
                            libjpeg62-turbo-dev \
                            libpng12-dev \
                            libcurl4-gnutls-dev \
                            libbz2-dev \
                            libssl-dev \
                            mariadb-client \
   && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
   && docker-php-ext-install \
                             pdo_mysql \
                             opcache \
                             json \
                             calendar \
                             bcmath \
                             xml \
                             zip \
                             bz2 \
                             mbstring \
                             mcrypt \
                             curl \
                             gd \
                             phar \
                             intl \
   && apt-get -y install \
            libmagickwand-dev \
        --no-install-recommends \
   && pecl install imagick \
   && docker-php-ext-enable imagick \
   && rm -r /var/lib/apt/lists/* \
   && usermod -u 1000 www-data

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN touch /usr/local/var/log/php-fpm.log && chown $PARENT_USER:$PARENT_USER /usr/local/var/log/php-fpm.log
USER $PARENT_USER

CMD ["bash", "/deploy.sh"]
