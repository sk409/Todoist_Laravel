FROM centos:7

RUN yum -y install epel-release \
    && rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm \
    && echo -e "[epel]\nname=Extra Packages for Enterprise Linux 7 - \$basearch\n#baseurl=http://download.fedoraproject.org/pub/epel/7/\$basearch\nmirrorlist=https://mirrors.fedoraproject.org/metalink?repo=epel-7&arch=\$basearch\nfailovermethod=priority\nenabled=0\ngpgcheck=1\ngpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-EPEL-7" > etc/yum.repos.d/epel.repo \
    && yum -y install wget \
    && yum -y install vim

RUN yum install -y --enablerepo=remi,remi-php72,epel php php-devel php-mbstring php-pdo php-gd php-xml php-mcrypt php-pecl-zip php-mysqlnd \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN yum -y install git