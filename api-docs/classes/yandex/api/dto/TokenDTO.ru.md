# TokenDTO

- **класс** `TokenDTO` (`yandex\api\dto\TokenDTO`)
- **исходники** `yandex/api/dto/TokenDTO.php`

---

#### Свойства

- `->`[`accessToken`](#prop-accesstoken) : `mixed`
- `->`[`expiresIn`](#prop-expiresin) : `mixed`
- `->`[`refreshToken`](#prop-refreshtoken) : `mixed`
- `->`[`tokenType`](#prop-tokentype) : `mixed`

---

#### Статичные Методы

- `TokenDTO ::`[`of()`](#method-of)

---

#### Методы

- `->`[`__construct()`](#method-__construct) - _TokenDTO constructor._
- `->`[`getAccessToken()`](#method-getaccesstoken)
- `->`[`getExpiresIn()`](#method-getexpiresin)
- `->`[`getRefreshToken()`](#method-getrefreshtoken)
- `->`[`getTokenType()`](#method-gettokentype)

---
# Статичные Методы

<a name="method-of"></a>

### of()
```php
TokenDTO::of(mixed $array): yandex\api\dto\TokenDTO
```

---
# Методы

<a name="method-__construct"></a>

### __construct()
```php
__construct(mixed $accessToken, mixed $expiresIn, mixed $refreshToken, mixed $tokenType): void
```
TokenDTO constructor.

---

<a name="method-getaccesstoken"></a>

### getAccessToken()
```php
getAccessToken(): string
```

---

<a name="method-getexpiresin"></a>

### getExpiresIn()
```php
getExpiresIn(): string
```

---

<a name="method-getrefreshtoken"></a>

### getRefreshToken()
```php
getRefreshToken(): string
```

---

<a name="method-gettokentype"></a>

### getTokenType()
```php
getTokenType(): string
```