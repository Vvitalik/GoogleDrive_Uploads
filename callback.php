<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfigFile('client_secret.json');
$client->setRedirectUri('https://otakoi.000webhostapp.com/callback.php');
$client->addScope(Google_Service_Drive::DRIVE); //::DRIVE_METADATA_READONLY

if (! isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    $client->authenticate($_GET['code']);
    $access_token = $client->getAccessToken();
    setcookie('key',json_encode($access_token),time() + (86400 * 30));

    $redirect_uri = 'https://otakoi.000webhostapp.com/';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}