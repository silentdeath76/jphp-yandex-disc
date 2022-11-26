<?php


use php\io\{File, FileStream, IOException};
use php\lib\fs;
use php\util\Configuration;
use tester\{Assert, TestCase};
use yandex\api\dto\ErrorDTO;
use yandex\YandexAPI;

class MainTest extends TestCase
{
    private $filePath = './config.txt';

    function testConfigurationStorage()
    {

        if (!fs::exists($this->filePath)) {
            try {
                FileStream::putContents($this->filePath, "");
            } catch (IOException $ignore) {
            }
        }

        $config = new Configuration($this->filePath);

        Assert::isEqual($config->get('nonExistsKey'), null);
        Assert::isNotEmpty($config->get("clientID"), "clientID - is empty, set configuration value");
        Assert::isNotEmpty($config->get("clientSecret"), "clientSecret - is empty, set configuration value");
        Assert::isNotEmpty($config->get("token"), "token - is empty, set configuration value");
    }

    function testYandex()
    {
        $config = new Configuration($this->filePath);

        $fileName = 'package.php.yml';

        YandexAPI::$logged = true;
        $yandex = YandexAPI::disc($config->get('token'));

        if (($response = $yandex->upload(File::of('./' . $fileName), 'Files')) instanceof ErrorDTO) {
            Assert::isTrue(false, $response->getMessage());
        } else {
            Assert::isTrue($response, "Not uploaded!");
        }

        if (($response = $yandex->pathInfo('Files/' . $fileName)) instanceof ErrorDTO) {
            Assert::isTrue(false, $response->getMessage());
        }

        if (($response = $yandex->makeFolder('Files/test')) instanceof ErrorDTO) {
            Assert::isTrue(false, $response->getMessage());
        }

        if (($response = $yandex->copy('Files/' . $fileName, 'Files/test')) instanceof ErrorDTO) {
            Assert::isTrue(false, $response->getMessage());
        }

        if (($response = $yandex->move('Files/' . $fileName, 'Files/test', true)) instanceof ErrorDTO) {
            Assert::isTrue(false, $response->getMessage());
        }

        if (($response = $yandex->publish('Files/test/' . $fileName)) instanceof ErrorDTO) {
            Assert::isTrue(false, $response->getMessage());
        }

        if (($response = $yandex->unpublish('Files/test/' . $fileName)) instanceof ErrorDTO) {
            Assert::isTrue(false, $response->getMessage());
        }

        if (($response = $yandex->delete('Files/test')) instanceof ErrorDTO) {
            Assert::isTrue(false, $response->getMessage());
        }

    }
}