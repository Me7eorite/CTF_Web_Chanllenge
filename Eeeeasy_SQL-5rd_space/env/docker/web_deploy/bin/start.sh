#!/bin/bash


find /var/lib/mysql -type f -exec touch {} \; && service mysql start

if [[ -f /root/ctf.sql ]]; then
    mysqladmin -u root password "ctf_2022_09_08_pwd"
    mysql -e "source /root/ctf.sql" -uroot -pctf_2022_09_08_pwd
    rm -f /root/ctf.sql
fi

service apache2 start
./root/pushflag.sh
tail -f /var/log/apache2/access.log