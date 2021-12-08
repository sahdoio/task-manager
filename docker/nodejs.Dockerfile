FROM node:14

WORKDIR /var/www

RUN apt-get update && apt-get -f -y install unzip wget

COPY package.json /var/www

RUN npm install

