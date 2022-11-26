<?php

namespace yandex;

use yandex\api\dto\TokenDTO;
use yandex\api\YandexDisc;

use httpclient\HttpClient;
//use bundle\http\HttpClient; // TODO uncommented if need make bundle and comment other import

class YandexAPI
{
    const BASE_API_URL = 'https://cloud-api.yandex.net/v1/disk/resources';
    const OATH_API_URL = 'https://oauth.yandex.ru/';

    /**
     * @var bool
     */
    public static $logged = false;

    /**
     * @var YandexDisc
     */
    private static $disc;

    /**
     * @param $clientID
     * @return string
     */
    public static function getCode($clientID)
    {
        return self::OATH_API_URL . 'authorize?response_type=code&client_id=' . $clientID;
    }

    /**
     * @param $clientID
     * @param $clientSecret
     * @param $code
     * @return TokenDTO
     * @throws \Exception
     */
    public static function getToken($clientID, $clientSecret, $code)
    {
        $http = new HttpClient();
        $http->responseType = 'JSON';
        $response = $http->post(self::OATH_API_URL . 'token', [
            "grant_type" => "authorization_code",
            "code" => $code,
            "client_id" => $clientID,
            "client_secret" => $clientSecret
        ])->body();

        return TokenDTO::of($response);
    }

    /**
     * @param $refreshToken
     * @param $clientID
     * @param $clientSecret
     * @return TokenDTO
     * @throws \Exception
     * @link https://yandex.ru/dev/id/doc/dg/oauth/reference/refresh-client.html
     */
    public static function refreshToken($refreshToken, $clientID, $clientSecret)
    {
        $http = new HttpClient();
        $http->responseType = 'JSON';
        $response = $http->post(self::OATH_API_URL . 'token', [
            "grant_type" => "refresh_token",
            "refresh_token" => $refreshToken,
            "client_id" => $clientID,
            "client_secret" => $clientSecret
        ])->body();

        return TokenDTO::of($response);
    }

    /**
     * @param $token
     *
     * @return YandexDisc
     * @throws \php\lang\IllegalArgumentException
     */
    public static function disc($token)
    {
        return YandexDisc::of($token);
    }
}