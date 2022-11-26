# ErrorDTO

- **класс** `ErrorDTO` (`yandex\api\dto\ErrorDTO`)
- **исходники** `yandex/api/dto/ErrorDTO.php`

---

#### Свойства

- `->`[`message`](#prop-message) : `string`
- `->`[`error`](#prop-error) : `string`
- `->`[`description`](#prop-description) : `string`

---

#### Статичные Методы

- `ErrorDTO ::`[`of()`](#method-of)

---

#### Методы

- `->`[`__construct()`](#method-__construct)
- `->`[`getMessage()`](#method-getmessage)
- `->`[`getError()`](#method-geterror)
- `->`[`getDescription()`](#method-getdescription)

---
# Статичные Методы

<a name="method-of"></a>

### of()
```php
ErrorDTO::of(mixed $array): yandex\api\dto\ErrorDTO
```

---
# Методы

<a name="method-__construct"></a>

### __construct()
```php
__construct(mixed $message, mixed $error, mixed $description): void
```

---

<a name="method-getmessage"></a>

### getMessage()
```php
getMessage(): string
```

---

<a name="method-geterror"></a>

### getError()
```php
getError(): string
```

---

<a name="method-getdescription"></a>

### getDescription()
```php
getDescription(): string
```