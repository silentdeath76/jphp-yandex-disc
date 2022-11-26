# YandexDisc

- **класс** `YandexDisc` (`yandex\api\YandexDisc`)
- **исходники** `yandex/api/YandexDisc.php`

---

#### Свойства

- `->`[`http`](#prop-http) : `HttpClient`
- `->`[`token`](#prop-token) : `string`

---

#### Статичные Методы

- `YandexDisc ::`[`of()`](#method-of)

---

#### Методы

- `->`[`__construct()`](#method-__construct)
- `->`[`info()`](#method-info) - _Вернет информацию о диске свободное место, общее количество места, информация об аккаунте и т.д._
- `->`[`download()`](#method-download) - _Получить прямую ссылку на скачивание._
- `->`[`pathInfo()`](#method-pathinfo) - _Получить информацию о пути (директория или файл)_
- `->`[`getFiles()`](#method-getfiles) - _Получить список файлов_
- `->`[`lastUploadedFiles()`](#method-lastuploadedfiles) - _Получить список последних загруженных файлов_
- `->`[`upload()`](#method-upload) - _Загрузить файл на диск_
- `->`[`copy()`](#method-copy) - _Скопировать файл_
- `->`[`move()`](#method-move) - _Переместить файл_
- `->`[`delete()`](#method-delete) - _Удалить файл_
- `->`[`makeFolder()`](#method-makefolder) - _Создать директорию_
- `->`[`publish()`](#method-publish) - _Сделать файл публичным_
- `->`[`unpublish()`](#method-unpublish) - _Сделать файл не публичным_
- `->`[`savePublicFile()`](#method-savepublicfile) - _Сохранить публичный файл на диск_
- `->`[`listOfPublicFiles()`](#method-listofpublicfiles) - _Получить список публичных файлов_
- `->`[`request()`](#method-request)
- `->`[`boolToStr()`](#method-booltostr)
- `->`[`addFileName()`](#method-addfilename)

---
# Статичные Методы

<a name="method-of"></a>

### of()
```php
YandexDisc::of(mixed $token): yandex\api\YandexDisc
```

---
# Методы

<a name="method-__construct"></a>

### __construct()
```php
__construct(mixed $token): void
```

---

<a name="method-info"></a>

### info()
```php
info(): false|ErrorDTO|array
```
Вернет информацию о диске свободное место, общее количество места, информация об аккаунте и т.д.

---

<a name="method-download"></a>

### download()
```php
download(mixed $path): \yandex\api\dto\ErrorDTO|array|false
```
Получить прямую ссылку на скачивание.

---

<a name="method-pathinfo"></a>

### pathInfo()
```php
pathInfo(mixed $path, int $offset, int $limit): \yandex\api\dto\ErrorDTO|array|false
```
Получить информацию о пути (директория или файл)

---

<a name="method-getfiles"></a>

### getFiles()
```php
getFiles(int $offset, int $limit): \yandex\api\dto\ErrorDTO|array|false
```
Получить список файлов

---

<a name="method-lastuploadedfiles"></a>

### lastUploadedFiles()
```php
lastUploadedFiles(int $offset, int $limit): \yandex\api\dto\ErrorDTO|array|false
```
Получить список последних загруженных файлов

---

<a name="method-upload"></a>

### upload()
```php
upload(php\io\File $file, mixed $path, boolean $overwrite): \yandex\api\dto\ErrorDTO|true
```
Загрузить файл на диск

---

<a name="method-copy"></a>

### copy()
```php
copy(mixed $from, mixed $path, false $overwrite): \yandex\api\dto\ErrorDTO|array|false
```
Скопировать файл

---

<a name="method-move"></a>

### move()
```php
move(mixed $from, mixed $path, false $overwrite): \yandex\api\dto\ErrorDTO|array|false
```
Переместить файл

---

<a name="method-delete"></a>

### delete()
```php
delete(mixed $path, false $permanently): \yandex\api\dto\ErrorDTO|bool
```
Удалить файл

---

<a name="method-makefolder"></a>

### makeFolder()
```php
makeFolder(mixed $path): \yandex\api\dto\ErrorDTO|array|false
```
Создать директорию

---

<a name="method-publish"></a>

### publish()
```php
publish(mixed $path): \yandex\api\dto\ErrorDTO|array|false
```
Сделать файл публичным

---

<a name="method-unpublish"></a>

### unpublish()
```php
unpublish(mixed $path): \yandex\api\dto\ErrorDTO|array|false
```
Сделать файл не публичным

---

<a name="method-savepublicfile"></a>

### savePublicFile()
```php
savePublicFile(mixed $link, null $name): \yandex\api\dto\ErrorDTO|array|false
```
Сохранить публичный файл на диск

---

<a name="method-listofpublicfiles"></a>

### listOfPublicFiles()
```php
listOfPublicFiles(int $limit, int $offset): \yandex\api\dto\ErrorDTO|array|false
```
Получить список публичных файлов

---

<a name="method-request"></a>

### request()
```php
request(mixed $method, mixed $url, array $params): \yandex\api\dto\ErrorDTO|array|false
```

---

<a name="method-booltostr"></a>

### boolToStr()
```php
boolToStr(bool $value): string
```

---

<a name="method-addfilename"></a>

### addFileName()
```php
addFileName(mixed $from, mixed $path): string
```