## mysql images docker
---------------------------------
https://hub.docker.com/_/mysql

$ php -version

# ejecutar archivo php
------------------------------
$ php nombre_archivo.php

## dockerizacion - crear network
-------------------------------------
$ docker network create platform-network

#añadimos la libreria mysqli para mysqli_connect()
en php.ini:
------------------
#extension=mysqli
extension=php_mysqli.dll

en Dockerfile de la carpeta php se colocan las extensiones necesarias
----------------------------------------------------------------------
extensiones => mysqli

## ejecutar servicios docker-compose => 
----------------------------------------
$ docker-compose up --build -d 

daba un error en el navegador => file not found
----------------------------------------------------------
esto es porque en fpm no está encontrando la ruta.
desde esta web dan la solucion:
http://geekyplatypus.com/dockerise-your-php-application-with-nginx-and-php7-fpm/

## arrancar/detener servicios docker-compose => 
$ docker-compose start
$ docker-compose stop
$ docker-compose down

$ docker container ls

## gateway e IP de mysql
-----------------------------
$ docker inspect id_contenedor_mysql

## IP de mysql
$ docker inspect id_contenedor_mysql | grep IPAddress

## entrar en el contenedor
--------------------------------
docker exec -i -t codigo_contenedor /bin/bash
docker exec -i -t e4d379f11b73 /bin/bash

## entrar en el contenedor de  mysql
------------------------------------
docker container ls
docker exec -i -t a59f7bb06265 /bin/bash

## desde localhost entro a la db
--------------------------------------
mysql -u root -p
pss: root
ó
mysql -ujavier -p123

$dry => para ver la IP de mysql en docker
---------------------------------------------

## saber ip de mysql en docker
-------------------------------
$ mysql -h localhost -P 3360 --protocol=tcp -u root

## desde aqui entro a la bd
----------------------------
$ mysql -h 172.23.0.1 -P 3600 --protocol=tcp -uroot -proot
$ mysql -h 172.23.0.1 -P 3600 --protocol=tcp -ujavier -p123

## acceso desde navegador con mysql
-------------------------------------------
http://127.0.0.1:250/www/conexion.php
http://127.0.0.1:250/www/index.php

## crear un usuario, desde contenedor de mysql
-----------------------------------------------------------
CREATE USER 'javier'@'172.23.0.1' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON * . * TO 'javier'@'172.23.0.1';
FLUSH PRIVILEGES;

$ mysql -h172.23.0.1 -P3600 --protocol=tcp -ujavier -p123
$ mysql -ujavier -p123 -h172.23.0.1 -P3600

## eliminar todos los contenedores
-----------------------------------
docker rm $(docker ps -a -q) -f

## eliminar todas las imagenes
-------------------------------
docker rmi $(docker images -q) 




