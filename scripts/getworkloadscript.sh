#!/bin/sh
#echo OK >/var/www/html/macs/cs/CS_Management_System/$1workload.txt
mysql -D csm -h mysql-server-1 -u csm -pmanagement -t </var/www/html/macs/cs/CS_Management_System/sql/$1workload.sql >>/var/www/html/macs/cs/CS_Management_System/$1workload.txt

#echo OK2 >>/var/www/html/macs/cs/CS_Management_System/$1workload.txt
