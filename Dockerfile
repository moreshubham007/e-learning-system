FROM php:5.6-apache
LABEL maintainer="https://hub.docker.com/shubhammore:latest"
COPY ./elearn/ /var/www/html/
