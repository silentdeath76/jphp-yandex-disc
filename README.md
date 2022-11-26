# jphp-yandexDisc-ext

##### Как пользоваться:

1. Создаем приложения [тут](https://oauth.yandex.ru/)
2. Настраиваем доступ только к диску
    - Находим: **Яндекс.Диск REST API**
    - Пункты выбираем по потребностям
3. В приложении получаем **ClientID**, **Client secret**

<br>


```php
\yandex\YandexAPI::getCode($clientID); // вернет ссылку которую открываем в браузере
```
На этой страничке нам нужно будет авторизоваться на сайте (если нужно) и скопировать код

<br>

Полученный код передаем сюда:

```php
$token = \yandex\YandexAPI::getToken($clientID, $clientSecret, 'Полученный код');
```

В случае успеха возвращает `\yandex\api\dto\TokenDTO` если же была ошибка произойдет исключение

<br>

##### Работа с диском

```php
$disc = \yandex\YandexAPI::disc($token->getAccessToken());
$disc->info(); // вернет информацию об аккаунте
```