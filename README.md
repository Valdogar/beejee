###README

- скачать/распаковать проект
- в папке проекта:

1. `sudo docker-compose -f docker-compose-dev.yml build`
2. `sudo docker-compose -f docker-compose-dev.yml up -d`//запуск контейнеров докера

4. `sudo su`
5.  `cat backup.sql | docker exec -i CONTAINER_MYSQL /usr/bin/mysql -u root --password=123456 beejee`// восстановление базы MySQL
7. `sudo docker exec -ti CONTAINER_MYSQL bash`
8. `mysql -u root -p beejee` // пароль "123456"
9. в командной линии mysql: 
 `INSERT INTO beejee.admins (id,login,password)
	VALUES (1,'admin','d9b1d7db4cd6e70935368a1efb10e377');` //добавление админа на сайт


###Все должно работать, но это не точно.


