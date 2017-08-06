<?php

namespace classes;
require_once __DIR__ . '/../vendor/autoload.php';
require_once '/interfaces/GoogleDriveInterface.php';

use interfaces\GoogleDriveInterface;

class GoogleDriveClass implements GoogleDriveInterface
{

    public function  __construct()
    {

    }

    private $redirectUri = 'https://otakoi.000webhostapp.com/callback.php';

    /**
     * @return \Google_Client
     *
     * authorize a client
     */
    public function createClient()
    {
        $client = new \Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(\Google_Service_Drive::DRIVE);
        $client->setAccessType('offline');

        return $client;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->redirectUri;
    }

    /**
     * @param $cookieKey
     * @param $client
     */
    public function accessToker($cookieKey, $client)
    {
        $access_token = $cookieKey;
        $client->setAccessToken($access_token);
    }

    /**
     * @param $client
     */
    public function refreshToker($client)
    {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        setcookie('key',json_encode($client->getAccessToken()),time() + (86400 * 30));
    }


}