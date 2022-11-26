# YandexAPI

- **class** `YandexAPI` (`yandex\YandexAPI`)
- **source** `yandex/YandexAPI.php`

---

#### Properties

- `->`[`logged`](#prop-logged) : `bool`
- `->`[`disc`](#prop-disc) : [`YandexDisc`](https://github.com/silentdeath76/jphp-yandexDisc-ext/blob/master/api-docs/classes/yandex/api/YandexDisc.md)

---

#### Static Methods

- `YandexAPI ::`[`getCode()`](#method-getcode)
- `YandexAPI ::`[`getToken()`](#method-gettoken)
- `YandexAPI ::`[`refreshToken()`](#method-refreshtoken)
- `YandexAPI ::`[`disc()`](#method-disc)

---
# Static Methods

<a name="method-getcode"></a>

### getCode()
```php
YandexAPI::getCode(mixed $clientID): string
```

---

<a name="method-gettoken"></a>

### getToken()
```php
YandexAPI::getToken(mixed $clientID, mixed $clientSecret, mixed $code): TokenDTO
```

---

<a name="method-refreshtoken"></a>

### refreshToken()
```php
YandexAPI::refreshToken(mixed $refreshToken, mixed $clientID, mixed $clientSecret): TokenDTO
```

---

<a name="method-disc"></a>

### disc()
```php
YandexAPI::disc(mixed $token): YandexDisc
```