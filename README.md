# Описание выполненной работы

Реализован интерфейс для добавления пользователя путём отправки AJAX запроса на сервер. Сервер добавляет пользователя в базу, после чего отправляет электронное письмо администратору, содержащее в себе данные только что добавленного пользователя. В ответ на запрос сервер возвращает json с ответом.

## Получение

Для установки потребуется: Node.js, Composer, Локальный сервер.

Склонируйте репозиторий в вашу рабочую директорию:

```git clone https://github.com/Leksizz/kontur-test-task.git```

Установите необходимые зависимости

```composer install```

```npm install```

```npm run build```

## База данных

Переименуйте файл ```.env.example``` в ```.env```

Настройте подключение к базе данных в соответсвии с вашей бд по примеру:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Выполните миграцию таблиц базы данных:

```php artisan migrate```

## Запуск приложения

Сгенерируйте ключ шифрования ```php artisan key:generate```

Выполните команду: 
```php artisan serve```

И перейдите по адресу 
[http://127.0.0.1:8000/users/create](http://127.0.0.1:8000/users/create)

## Запуск очередей 

Для запуска работы очередей выполните команду: 

```php artisan queue:work```

## Электронные письма

Настройте получение и отправку электронных писем в env файле в зависимости от ваших требований по примеру:

```
MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```
