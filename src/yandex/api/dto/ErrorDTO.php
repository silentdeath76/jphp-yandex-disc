<?php


namespace yandex\api\dto;


use InvalidArgumentException;

/**
 * Class ErrorDTO
 * @package yandex\api\dto
 * @packages yandex
 */
class ErrorDTO
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $error;

    /**
     * @var string
     */
    private $description;


    /**
     * @throws \InvalidArgumentException
     */
    public static function of($array): ErrorDTO
    {
        if (
            !array_key_exists('message', $array) ||
            !array_key_exists('error', $array) ||
            !array_key_exists('description', $array)
        ) throw new InvalidArgumentException("Wrong array structure");

        return new self($array["message"], $array["error"], $array["description"]);
    }


    private function __construct($message, $error, $description)
    {
        $this->message = $message;
        $this->error = $error;
        $this->description = $description;
    }


    public function getMessage(): string
    {
        return $this->message;
    }


    public function getError(): string
    {
        return $this->error;
    }


    public function getDescription(): string
    {
        return $this->description;
    }
}