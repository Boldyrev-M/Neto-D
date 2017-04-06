# Инструкция по установке

## Технические требования

Для работы приложения на вашем компьютере (сервере) должны быть установлены:
- PHP (версия не ниже 5.6.13)
- MySQL 
- сервер Apache

## Установка приложения 

Рабочая версия файлов приложения находится по адресу: 
https://github.com/Boldyrev-M/Neto-D/tree/master/blog  
Для установки приложения скопируйте исходные файлы, сохраняя структуру каталогов.

## Подготовка базы данных

Создайте пустую базу данных для работы приложения.  
Импортируйте структуру таблиц и начальные данные из файла faq.sql

## Конфигурационные файлы

### .htaccess 

Измените настройки в соответствии с конфигурацией вашего сервера.  
Данный файл должен обеспечивать переадресацию запросов к сайту на файл public/index.php.
Пример:  
```
Options -Indexes
RewriteEngine On
RewriteRule ^(.*)$ public/$1 [L,QSA]
```
### /config/database.php 

В данном файле установите параметры доступа к вашей базе данных.  
Пример:	
```
'mysql' => [
'driver' => 'mysql',
'host' => env('DB_HOST', 'localhost'),
'port' => env('DB_PORT', '8889'),
'database' => env('DB_DATABASE', 'your_db_name'),
'username' => env('DB_USERNAME', 'root'),
'password' => env('DB_PASSWORD', 'root'),
'charset' => 'utf8',
'collation' => 'utf8_general_ci',
```
### .env

В файле .env в корневом каталоге установите параметры доступа к вашей базе данных и APP_URL - адрес вашего приложения (сайт).  
Пример:
```
APP_URL=http://your_laravel.ru

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=db_user_name
DB_PASSWORD=db_password
```
## Начало работы

Зайдите на сайт и убедитесь, что открывается начальная страница сайта.  
Инструкция по работе с приложением находится по адресу:  
https://docs.google.com/document/d/1RKDsSQu4TWLyZmFEv9mDS5XuKoKlvDUjrL8KSxTejpI/edit?usp=sharing

Начальные данные для работы с интерфейсом администратора:  
E-mail: admin@admin  
Password: admin  

