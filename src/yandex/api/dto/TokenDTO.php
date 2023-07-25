<?php


namespace yandex\api\dto;

/**
 * Class TokenDTO
 * @package yandex\api\dto
 * @packages yandex
 */
class TokenDTO
{
    private $accessToken;
    private $expiresIn;
    private $refreshToken;
    private $tokenType;

    /**
     * @throws \Exception
     */
    public static function of($array): TokenDTO
    {
        if (isset($array["error"])) {
            throw new \Exception("Error: " . $array["error_description"]);
        }

        return new self($array["access_token"], $array["expires_in"], $array["refresh_token"], $array["token_type"]);
    }

    /**
     * TokenDTO constructor.
     * @param $accessToken
     * @param $expiresIn
     * @param $refreshToken
     * @param $tokenType
     */
    public function __construct($accessToken, $expiresIn, $refreshToken, $tokenType)
    {
        $this->accessToken = $accessToken;
        $this->expiresIn = $expiresIn;
        $this->refreshToken = $refreshToken;
        $this->tokenType = $tokenType;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @return string
     */
    public function getTokenType()
    {
        return $this->tokenType;
    }
}