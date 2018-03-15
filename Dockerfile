FROM phpdrone/composer:php71-latest 

ENV PLUGIN_TARGET *
ENV PLUGIN_MODULE test.ping
ENV PLUGIN_ARGS ""

ENV SALTAPI_HOST localhost
ENV SALTAPI_PORT 8000
ENV SALTAPI_USER user
ENV SALTAPI_PASS pass
ENV SALTAPI_EAUTH pam

RUN mkdir /plugin
WORKDIR /plugin
ADD . /plugin
RUN composer install --ansi --prefer-dist --no-dev
ENTRYPOINT [ "php", "/plugin/main.php" ]
