FROM alpine:3.18

RUN apk add --no-cache \
    php82 \
    php82-pdo_mysql \
    php82-zip \
    zip

WORKDIR /app
COPY . .
