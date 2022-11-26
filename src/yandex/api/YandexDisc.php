<?php

namespace yandex\api;

use yandex\api\dto\ErrorDTO;
use yandex\YandexAPI;
use php\io\File;
use php\lang\IllegalArgumentException;
use php\lib\str;

use httpclient\HttpClient;
//use bundle\http\HttpClient; // TODO uncommented if need make bundle and comment other import

final class YandexDisc
{
    /**
     * @var HttpClient
     */
    private $http;

    /**
     * @var string
     */
    private $token;

    /**
     * @param  $token
     * @return YandexDisc
     *
     * @throws IllegalArgumentException
     */
    public static function of($token): YandexDisc
    {
        if ($token === null) {
            throw new IllegalArgumentException("Wrong value arguments. Value cant be null");
        }

        return new self($token);
    }


    /**
     * @param $token
     */
    function __construct($token)
    {
        $this->token = $token;

        $this->http = new HttpClient();
        $this->http->responseType = 'JSON';
        $this->http->headers["Authorization"] = 'OAuth ' . $this->token;
    }


    /**
     * Return disk info free space, total space,  account info, ... etc
     * --RU--
     * Вернет информацию о диске свободное место, общее количество места, информация об аккаунте и т.д.
     *
     * @return false|ErrorDTO|array
     */
    public function info()
    {
        return $this->request('get', 'https://cloud-api.yandex.net/v1/disk/');
    }


    /**
     * Get directly link for download file.
     * --RU--
     * Получить прямую ссылку на скачивание.
     *
     * @param $path
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/content.html
     */
    public function download($path)
    {
        $url = YandexAPI::BASE_API_URL . '/download?path=' . urlencode($path) . '&fields=name,_embedded.items.path';

        return $this->request('get', $url);
    }


    /**
     * Get path info (directory or file)
     * --RU--
     * Получить информацию о пути (директория или файл)
     *
     * @param $path
     * @param int $offset
     * @param int $limit
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/meta.html
     */
    public function pathInfo($path, $offset = 0, $limit = 20)
    {
        $url = sprintf(YandexAPI::BASE_API_URL . '?path=%s&offset=%s&limit=%s', urlencode($path), $offset, $limit);

        return $this->request('get', $url);
    }


    /**
     * Get flat file list
     * --RU--
     * Получить список файлов
     *
     * @param int $offset
     * @param int $limit
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/all-files.html
     */
    public function getFiles($offset = 0, $limit = 20)
    {
        $url = sprintf(YandexAPI::BASE_API_URL . '/files?limit=%s&offset=%s&fields=name,_embedded.items.path', $limit, $offset);

        return $this->request('get', $url);
    }


    /**
     * Get last uploaded file list
     * --RU--
     * Получить список последних загруженных файлов
     *
     * @param int $offset
     * @param int $limit
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/recent-upload.html
     */
    public function lastUploadedFiles($offset = 0, $limit = 20)
    {
        $url = sprintf(YandexAPI::BASE_API_URL . '/last-uploaded?limit=%s&offset=%s&fields=name,_embedded.items.path', $limit, $offset);

        return $this->request('get', $url);
    }


    // https://yandex.ru/dev/disk/api/reference/meta-add.html
    /* private function addMeta($path, array $properties)
    {
        // метод patch не работает у httpclient'а

        $url = sprintf(YandexAPI::BASE_API_URL . '?path=%s', $path);
        return $this->http->patch($url, ["custom_properties" => json_encode($properties)])->body();
    } */


    /**
     * Upload file to disc
     * --RU--
     * Загрузить файл на диск
     *
     * @param \php\io\File $file
     * @param $path
     * @param boolean $overwrite
     * @return \yandex\api\dto\ErrorDTO|true
     * @link https://yandex.ru/dev/disk/api/reference/upload.html
     */
    public function upload(File $file, $path, $overwrite = false)
    {
        $path = $this->addFileName($file, $path);

        $url = sprintf(YandexAPI::BASE_API_URL . '/upload?path=%s&overwrite=%s', urlencode($path), $this->boolToStr($overwrite));

        $response = $this->request('get', $url);

        if ($response instanceof ErrorDTO) {
            return $response;
        } else if ($response["href"] !== null) {
            $this->http->requestType = 'MULTIPART';

            try {
                $response = $this->request('put', $response["href"], ["file" => File::of($file)]);
            } catch (\Exception $ignore) {
            } finally {
                $this->http->requestType = 'URLENCODE';
            }

            // if success return null body and 201 or 202 status code
            return !($response instanceof ErrorDTO);
        }
    }


    /*
    // https://yandex.ru/dev/disk/api/reference/upload-ext.html
    // upload from ethernet???
    private function uploadExt($link, $path)
    {
    } */


    /**
     * Copy file
     * --RU--
     * Скопировать файл
     *
     * @param $from
     * @param $path
     * @param false $overwrite
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/copy.html
     */
    public function copy($from, $path, $overwrite = false)
    {
        $path = $this->addFileName($from, $path);

        $url = sprintf(YandexAPI::BASE_API_URL . '/copy?from=%s&path=%s&overwrite=%s', urlencode($from), urlencode($path), $this->boolToStr($overwrite));

        return $this->request('POST', $url);
    }


    /**
     * Move file
     * --RU--
     * Переместить файл
     *
     * @param $from
     * @param $path
     * @param false $overwrite
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/move.html
     */
    public function move($from, $path, $overwrite = false)
    {
        $path = $this->addFileName($from, $path);

        $url = sprintf(YandexAPI::BASE_API_URL . '/move?from=%s&path=%s&overwrite=%s', urlencode($from), urlencode($path), $this->boolToStr($overwrite));
        return $this->request('post', $url);
    }


    /**
     * Delete file
     * --RU--
     * Удалить файл
     *
     * @param $path
     * @param false $permanently
     * @return \yandex\api\dto\ErrorDTO|bool
     * @link https://yandex.ru/dev/disk/api/reference/delete.html
     */
    public function delete($path, $permanently = false)
    {
        $url = sprintf(YandexAPI::BASE_API_URL . '?path=%s&permanently=%s', urlencode($path), $this->boolToStr($permanently));
        $response = $this->request('delete', $url);

        if (!($response instanceof ErrorDTO)) {
            return true;
        }

        return $response;
    }


    /**
     * Make folder
     * --RU--
     * Создать директорию
     *
     * @param $path
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/create-folder.html
     */
    public function makeFolder($path)
    {
        $url = sprintf(YandexAPI::BASE_API_URL . '?path=%s', urlencode($path));
        return $this->request('put', $url);
    }


    /**
     * Make file as public
     * --RU--
     * Сделать файл публичным
     *
     * @param $path
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/publish.html
     */
    public function publish($path)
    {
        $url = sprintf(YandexAPI::BASE_API_URL . '/publish?path=%s', urlencode($path));
        return $this->request('put', $url);
    }


    /**
     * Make file as not public
     * --RU--
     * Сделать файл не публичным
     *
     * @param $path
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/publish.html
     */
    public function unpublish($path)
    {
        $url = sprintf(YandexAPI::BASE_API_URL . '/unpublish?path=%s', urlencode($path));
        return $this->request('put', $url);
    }


    /**
     * Save public file to disc
     * --RU--
     * Сохранить публичный файл на диск
     *
     * @param $link
     * @param null $name
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/public.html#save
     */
    public function savePublicFile($link, $name = null)
    {
        $url = sprintf(YandexAPI::BASE_API_URL . '/download?public_key=%s', urlencode($link));
        if ($name !== null) {
            $url .= '&name=' . $name;
        }

        return $this->request('post', $url);
    }


    /**
     * Get public files
     * --RU--
     * Получить список публичных файлов
     *
     * @param int $limit
     * @param int $offset
     * @return \yandex\api\dto\ErrorDTO|array|false
     * @link https://yandex.ru/dev/disk/api/reference/recent-public.html
     */
    public function listOfPublicFiles($limit = 20, $offset = 0)
    {
        $url = sprintf(YandexAPI::BASE_API_URL . '/public?limit=%s&offset=%s', $limit, $offset);
        return $this->request('get', $url);
    }

    /*
    // https://yandex.ru/dev/disk/api/reference/trash-delete.html
    public function trashDelete()
    {
    }

    // https://yandex.ru/dev/disk/api/reference/trash-restore.html
    public function trashRestore()
    {
    }
    */


    /**
     * @param $method
     * @param $url
     * @param array $params
     * @return \yandex\api\dto\ErrorDTO|array|false
     */
    private function request($method, $url, $params = [])
    {
        $method = str::upper($method);

        $request = $this->http->execute($method, $url, $params);
        // $request = $this->http->execute($url, $method, $params); // for develnext IDE
        $response = $request->body();

        if (($status = $request->statusCode()) >= 400) {        // error
            if (isset($response["error"])) {
                try {
                    return ErrorDTO::of($response);
                } catch (\Exception $e) {
                    if (YandexAPI::$logged) {
                        $errorMeta = [
                            "method" => $method,
                            "url" => $url,
                            "params" => $params,
                            "statusCode" => $request->statusCode(),
                            "Exception" => [
                                $e->getMessage(),
                                "response" => $response
                            ]
                        ];

                        file_put_contents('./error.log', json_encode($errorMeta) . "\r\n", FILE_APPEND);
                    }
                    echo "Error: " . $e->getMessage() . "\r\n";
                    return false;
                }
            }
        }

        // как то слишком много всяких успешных статусов у этой АПИхи
        switch ($status) {
            case 200:
            case 201:
            case 202:
            case 204:
                return $response;
        }
    }

    /**
     * @param bool $value
     * @return string
     */
    private function boolToStr(bool $value): string
    {
        return $value == true ? "true" : "false";
    }

    /**
     * @param $from
     * @param $path
     * @return string
     */
    private function addFileName($from, $path): string
    {
        $name = File::of($from)->getName();

        if (!str::endsWith($path, '/')) {
            $path .= '/';
        }

        return $path . $name;
    }
}