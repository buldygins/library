## Инструкции по запуску

Весь проект сделан на framework Laravel, так что для запуска надо:
* скопировать репозиторий
* установить Laravel
 ```shell
composer instal
```
* присутствует файл миграции таблиц книг и авторов, необходимо настроить подключение к БД в файле .env и запустить миграции
 ```shell
php artisan migrate
``` 
* настроить виртуальный хост 
 * запустить сервер

## О выполнении задания

* еонсольная команда, удаляющая книги более 1 года назад вызывается
```shell script
php artisan books:clear
```
