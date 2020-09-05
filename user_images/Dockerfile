#基础镜像centos
FROM 9f38484d220f

#作者信息
MAINTAINER Wenhua and Chen

#工作目录
WORKDIR /user/

#安装httpd和php，要注意安装过程中可能出现错误导致命令运行失败而终端build镜像，可以忽略错误，继续执行，所以使用||true来保证build的顺利进行。
RUN yum -y install httpd php

#安装mysql客户端(用来和远程mysql服务端通信)和php-mysqlnd(用于php和mysql的沟通驱动)；
RUN yum -y install mysql php-mysqlnd

#定义环境变量，下面的ip地址就是刚才创建mysql容器的ip地址，
#ENV MYSQL_ADDR 172.17.0.4:3306

ENV MYSQL_ADDR 172.17.0.3
ENV MYSQL_USER root
ENV MYSQL_PASS 123456
ENV MYSQL_DATABASE docker_user

#定义启动服务必需的环境变量TERM，并定义支持中文；
ENV TERM linux
ENV LC_ALL en_US.UTF-8
#注意：mysql8字符集已改为utf8mb4格式，创建容器时要改为utf-8，否则浏览器不识别。

#html，php页面。
#ADD index.html /var/www/html/index.html

#导出apache的服务端口80
EXPOSE 80


# 安装openssh-server
RUN yum -y install openssh-server

RUN mkdir /var/run/sshd
RUN ssh-keygen -t rsa -f /etc/ssh/ssh_host_rsa_key
RUN ssh-keygen -t dsa -f /etc/ssh/ssh_host_dsa_key

# 指定root密码
RUN /bin/echo 'root:123456'|chpasswd
RUN /bin/sed -i 's/.*session.*required.*pam_loginuid.so.*/session optional pam_loginuid.so/g' /etc/pam.d/sshd
RUN /bin/echo -e "LANG=\"en_US.UTF-8\"" > /etc/default/local

EXPOSE 22


#添加启动脚本
ADD run.sh /user/run.sh
RUN chmod u+x /user/run.sh

CMD /user/run.sh
