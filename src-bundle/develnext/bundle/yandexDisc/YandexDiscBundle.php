<?php


namespace develnext\bundle\yandexDisc;

use ide\bundle\AbstractJarBundle;
use develnext\bundle\httpclient\HttpClientBundle;

class YandexDiscBundle extends AbstractJarBundle
{
    /**
     * @return array
     */
    public function getDependencies()
    {
        return [
            HttpClientBundle::class
        ];
    }
}