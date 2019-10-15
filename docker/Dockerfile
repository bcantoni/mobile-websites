FROM php:7.3-apache

LABEL maintainer "brian@cantoni.org"

COPY src/ /var/www/html/
COPY conf/default.conf /etc/apache2/sites-available/000-default.conf
COPY conf/fqdn /etc/apache2/conf-available/fqdn.conf

EXPOSE 80
EXPOSE 443

RUN \
    a2enmod -q deflate expires headers rewrite ;\
    a2enconf -q fqdn

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
