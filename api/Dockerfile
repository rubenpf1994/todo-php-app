FROM ubuntu:16.04

RUN apt-get update
RUN apt-get install -y apache2

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

RUN echo 'Hello, docker' > /var/www/index.html


ENTRYPOINT ["/bin/bash"]
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

RUN apt-get update
RUN apt-get install -y php libapache2-mod-php php-common php-mbstring php-xmlrpc php-soap php-gd php-xml php-intl php-mysql php-cli php-curl 

RUN php -v
