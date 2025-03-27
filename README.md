AntLog 
======

AntLog is a web application for running AWS-style double-elimination contests. It is based on the Yii 2 
Basic Application Template, plus the user database table from the Yii 2 Advanced Application Template.


REQUIREMENTS
------------

The minimum requirement for this application is that your Web server supports PHP 5.4.0.


INSTALLATION
------------
FOR DOCKER [https://hub.docker.com/r/mohitburkule/antlog-image](https://hub.docker.com/r/mohitburkule/antlog-image)

```
docker run -d -p 80:80 --name antlog-container mohitburkule/antlog-image:latest
```
See the [Wiki](https://github.com/GaryA/antlog/wiki) for details of installation and set-up.

Useful commands
------------

    1  cd /opt/lampp/logs/
    
    9  nano /opt/lampp/etc/php.ini
    
   10  cat error_log 
   
   11  ls
   
   12  cat php_error_log 
   
   13  tail -f php_error_log 
   
   14  nano /www/config/web.php
   
   25  /opt/lampp/bin/mysql -u root -p
   
   27  chmod -R 777 /opt/lampp/htdocs/www/antlog/assets
   
   28  tail -f /opt/lampp/logs/php_error_log 
