# ErrorDTO

- **class** `ErrorDTO` (`yandex\api\dto\ErrorDTO`)
- **source** `yandex/api/dto/ErrorDTO.php`

---

#### Properties

- `->`[`message`](#prop-message) : `string`
- `->`[`error`](#prop-error) : `string`
- `->`[`description`](#prop-description) : `string`

---

#### Static Methods

- `ErrorDTO ::`[`of()`](#method-of)

---

#### Methods

- `->`[`__construct()`](#method-__construct)
- `->`[`getMessage()`](#method-getmessage)
- `->`[`getError()`](#method-geterror)
- `->`[`getDescription()`](#method-getdescription)

---
# Static Methods

<a name="method-of"></a>

### of()
```php
ErrorDTO::of(mixed $array): yandex\api\dto\ErrorDTO
```

---
# Methods

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