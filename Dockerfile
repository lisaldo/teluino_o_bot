FROM php:7.4-alpine

RUN apk update \
    && apk add composer 

RUN mkdir /app && chmod a+w -R /app
