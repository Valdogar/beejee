FROM nginx:stable

# delete default configs
RUN rm -rf /etc/nginx/conf.d && mkdir /etc/nginx/conf.d
RUN rm /etc/nginx/nginx.conf

WORKDIR /application