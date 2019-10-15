FROM php:7.3-apache

LABEL maintainer "brian@cantoni.org"

COPY src/ /var/www/html/
COPY conf/default.conf /etc/apache2/sites-available/000-default.conf
COPY conf/fqdn /etc/apache2/conf-available/fqdn.conf

EXPOSE 80
EXPOSE 443

RUN \
    a2enmod deflate ;\
    a2enmod expires ;\
    a2enmod headers ;\
    a2enmod rewrite ;\
    a2enconf fqdn

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
