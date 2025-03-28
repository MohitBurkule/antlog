FROM tomsik68/xampp:5

WORKDIR /www

COPY . /www

RUN chmod -R 777 /opt/lampp/htdocs/www/antlog/assets
RUN chmod +x start.sh  # Make your existing start.sh executable
RUN chmod +x /www/start.sh  # Make your existing start.sh executable

RUN ls -l /www/start.sh 

CMD ["bash", "-c", "chmod -R 777 /opt/lampp/htdocs/www/antlog/assets /www/ && chmod +x start.sh && ./start.sh"]

EXPOSE 80
