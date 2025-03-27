#!/bin/bash
/opt/lampp/lampp start &
sleep 15
/opt/lampp/bin/mysql -u root --password="" -e "CREATE DATABASE IF NOT EXISTS antlog"
/opt/lampp/bin/mysql -u root --password="" antlog < /www/antlog_demo.sql
/opt/lampp/bin/apachectl -D FOREGROUND
/opt/lampp/lampp start
/usr/bin/supervisord -n

