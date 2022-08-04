FROM node:16-alpine3.15

ARG user

RUN mkdir -p /var/www

USER $user

WORKDIR /var/www

ENTRYPOINT ["tail", "-f", "/dev/null"]