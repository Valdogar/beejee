###README

- скачать/распаковать проект
- в папке проекта:

1. `sudo docker-compose build`
2. `sudo docker-compose up -d`

4. `sudo su`
5.  `cat backup.sql | docker exec -i CONTAINER /usr/bin/mysql -u root --password=123456 test`// восстановление базы MySQL

8. `sudo docker exec -ti CONTAINER bash` // заходим в контейнер PHP 5.6
9. `php -S 0.0.0.0:8000 htaccess.php` // запускаем встроенный сервер
- в дальнейшем использовать только 2, 5 и 6 пункты.
-  Переходим сюда http://localhost:8000/register
- регистрируемся/логинимся/my page/
- создаем темы ( а кто говорил, что будет легко?)
- создаем ресурсы.

###Все должно работать, но это не точно.


