#!/bin/bash

#ssh
/usr/sbin/sshd -D &

#httpd
httpd
#防止脚本结束
while true;do sleep 1000;done 

#mysql
#mysqld_safe


#sshd
#/usr/sbin/sshd -D
#set -e
#/usr/sbin/sshd &
#/usr/sbin/httpd -D FOREGROUND
