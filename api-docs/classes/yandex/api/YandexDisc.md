# YandexDisc

- **class** `YandexDisc` (`yandex\api\YandexDisc`)
- **source** `yandex/api/YandexDisc.php`

---

#### Properties

- `->`[`http`](#prop-http) : `HttpClient`
- `->`[`token`](#prop-token) : `string`

---

#### Static Methods

- `YandexDisc ::`[`of()`](#method-of)

---

#### Methods

- `->`[`__construct()`](#method-__construct)
- `->`[`info()`](#method-info) - _Return disk info free space, total space,  account info, ... etc_
- `->`[`download()`](#method-download) - _Get directly link for download file._
- `->`[`pathInfo()`](#method-pathinfo) - _Get path info (directory or file)_
- `->`[`getFiles()`](#method-getfiles) - _Get flat file list_
- `->`[`lastUploadedFiles()`](#method-lastuploadedfiles) - _Get last uploaded file list_
- `->`[`upload()`](#method-upload) - _Upload file to disc_
- `->`[`copy()`](#method-copy) - _Copy file_
- `->`[`move()`](#method-move) - _Move file_
- `->`[`delete()`](#method-delete) - _Delete file_
- `->`[`makeFolder()`](#method-makefolder) - _Make folder_
- `->`[`publish()`](#method-publish) - _Make file as public_
- `->`[`unpublish()`](#method-unpublish) - _Make file as not public_
- `->`[`savePublicFile()`](#method-savepublicfile) - _Save public file to disc_
- `->`[`listOfPublicFiles()`](#method-listofpublicfiles) - _Get public files_
- `->`[`request()`](#method-request)
- `->`[`boolToStr()`](#method-booltostr)
- `->`[`addFileName()`](#method-addfilename)

---
# Static Methods

<a name="method-of"></a>

### of()
```php
YandexDisc::of(mixed $token): yandex\api\YandexDisc
```

---
# Methods

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
Return disk info free space, total space,  account info, ... etc

---

<a name="method-download"></a>

### download()
```php
download(mixed $path): \yandex\api\dto\ErrorDTO|array|false
```
Get directly link for download file.

---

<a name="method-pathinfo"></a>

### pathInfo()
```php
pathInfo(mixed $path, int $offset, int $limit): \yandex\api\dto\ErrorDTO|array|false
```
Get path info (directory or file)

---

<a name="method-getfiles"></a>

### getFiles()
```php
getFiles(int $offset, int $limit): \yandex\api\dto\ErrorDTO|array|false
```
Get flat file list

---

<a name="method-lastuploadedfiles"></a>

### lastUploadedFiles()
```php
lastUploadedFiles(int $offset, int $limit): \yandex\api\dto\ErrorDTO|array|false
```
Get last uploaded file list

---

<a name="method-upload"></a>

### upload()
```php
upload(php\io\File $file, mixed $path, boolean $overwrite): \yandex\api\dto\ErrorDTO|true
```
Upload file to disc

---

<a name="method-copy"></a>

### copy()
```php
copy(mixed $from, mixed $path, false $overwrite): \yandex\api\dto\ErrorDTO|array|false
```
Copy file

---

<a name="method-move"></a>

### move()
```php
move(mixed $from, mixed $path, false $overwrite): \yandex\api\dto\ErrorDTO|array|false
```
Move file

---

<a name="method-delete"></a>

### delete()
```php
delete(mixed $path, false $permanently): \yandex\api\dto\ErrorDTO|bool
```
Delete file

---

<a name="method-makefolder"></a>

### makeFolder()
```php
makeFolder(mixed $path): \yandex\api\dto\ErrorDTO|array|false
```
Make folder

---

<a name="method-publish"></a>

### publish()
```php
publish(mixed $path): \yandex\api\dto\ErrorDTO|array|false
```
Make file as public

---

<a name="method-unpublish"></a>

### unpublish()
```php
unpublish(mixed $path): \yandex\api\dto\ErrorDTO|array|false
```
Make file as not public

---

<a name="method-savepublicfile"></a>

### savePublicFile()
```php
savePublicFile(mixed $link, null $name): \yandex\api\dto\ErrorDTO|array|false
```
Save public file to disc

---

<a name="method-listofpublicfiles"></a>

### listOfPublicFiles()
```php
listOfPublicFiles(int $limit, int $offset): \yandex\api\dto\ErrorDTO|array|false
```
Get public files

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