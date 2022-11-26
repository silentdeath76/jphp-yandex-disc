# TokenDTO

- **class** `TokenDTO` (`yandex\api\dto\TokenDTO`)
- **source** `yandex/api/dto/TokenDTO.php`

---

#### Properties

- `->`[`accessToken`](#prop-accesstoken) : `mixed`
- `->`[`expiresIn`](#prop-expiresin) : `mixed`
- `->`[`refreshToken`](#prop-refreshtoken) : `mixed`
- `->`[`tokenType`](#prop-tokentype) : `mixed`

---

#### Static Methods

- `TokenDTO ::`[`of()`](#method-of)

---

#### Methods

- `->`[`__construct()`](#method-__construct) - _TokenDTO constructor._
- `->`[`getAccessToken()`](#method-getaccesstoken)
- `->`[`getExpiresIn()`](#method-getexpiresin)
- `->`[`getRefreshToken()`](#method-getrefreshtoken)
- `->`[`getTokenType()`](#method-gettokentype)

---
# Static Methods

<a name="method-of"></a>

### of()
```php
TokenDTO::of(mixed $array): yandex\api\dto\TokenDTO
```

---
# Methods

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