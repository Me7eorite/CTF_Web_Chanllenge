FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

MAINTAINER me7eorite 

COPY ./bin/config/sources.list /etc/apt/sources.list

RUN \
        apt update -y && \
        apt install -y php apache2 mysql-server vim curl gcc && \
        apt install -yqq php-mysql php-gd php-xml

RUN rm /var/www/html/* 
COPY ./bin/src /var/www/html/
COPY ./bin/start.sh /root/
COPY ./bin/pushflag.sh /root/
COPY ./bin/ctf.sql /root/

RUN \
        chown -R root:root /var/www/html/ && \
        chmod -R 755 /var/www/html && \
        chmod a+x /root/start.sh && \
        chmod a+x /root/pushflag.sh && \
        usermod -d /var/lib/mysql/ mysql 

ENTRYPOINT ["bash","/root/start.sh"]
EXPOSE 80
