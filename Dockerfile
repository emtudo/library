FROM ciareis/base-php-v3:php-8.0 as builder

WORKDIR /var/www/app

USER root

RUN composer self-update

COPY --chown=app:app composer.* ./

# INSTALL
RUN echo -e "\n # ---> Installing Dependencies \n" && \
  # composer install
  composer install --no-interaction --no-progress --prefer-dist --no-autoloader --no-scripts --ignore-platform-reqs

# COPY SOURCE
COPY --chown=app:app . .

RUN composer install --no-interaction --no-progress --prefer-dist --ignore-platform-reqs

FROM ciareis/base-php-v3:php-8.0

WORKDIR /var/www/app
USER root

# COPY SOURCE
COPY --chown=app:app --from=builder /var/www/app .

# args
ARG APP_VERSION=unknown
ARG GIT_HASH=unknown
ARG BUILDER=unknown
ARG BUILD_NUMBER=unknown
ARG BUILD_DATE=unknown

# Environment
ENV GIT_HASH=$GIT_HASH \
  APP_VERSION=$APP_VERSION \
  LOG_LEVEL=info \
  NODE_ENV=production

COPY --chown=app:app start.sh /scripts/start.sh
RUN chmod +x /scripts/start.sh

USER app

EXPOSE 80

# Starts a single shell script that puts php-fpm as a daemon and nginx on foreground
CMD ["production"]

FROM ciareis/base-php-v3:php-8.0

WORKDIR /var/www/app

USER root

RUN composer self-update

COPY --chown=app:app composer.* ./

# INSTALL
RUN echo -e "\n # ---> Installing Dependencies \n" && \
  # composer install
  composer install --no-interaction --no-progress --prefer-dist --no-autoloader --no-scripts --ignore-platform-reqs

# COPY SOURCE
COPY --chown=app:app . .

RUN composer install --no-interaction --no-progress --prefer-dist --ignore-platform-reqs


# Environment
ENV GIT_HASH=$GIT_HASH \
  APP_VERSION=$APP_VERSION \
  LOG_LEVEL=info \
  NODE_ENV=production

COPY --chown=app:app start.sh /scripts/start.sh
RUN chmod +x /scripts/start.sh

USER app

# Starts a single shell script that puts php-fpm as a daemon and nginx on foreground
CMD ["production"]
