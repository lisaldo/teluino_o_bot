FROM php:7.4-alpine

RUN apk update \
    && apk add composer bash make

RUN adduser teluino -DH -u 1000 -s /bin/bash

RUN mkdir /app && chown -R teluino.teluino /app

EXPOSE 8095
