FROM centos:7


LABEL authmicroservice.kwafodev.version=v1.1

ENV AUTHMICROSERVICE_ENV="development"
ENV PORT 3000

RUN yum -y install git
RUN yum -y install epel-release yum-utils
RUN yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum-config-manager --enable remi-php73
RUN yum -y install php php-common php-opcache php-mcrypt php-cli php-gd php-curl php-mysqlnd
RUN cd /tmp
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

EXPOSE $PORT

CMD [ "sh", "-c", "service ssh start; bash"]

