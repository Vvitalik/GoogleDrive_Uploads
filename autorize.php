<?php
include_once 'classes/GoogleDriveClass.php';

$gDrive = new classes\GoogleDriveClass();
$client = $gDrive->createClient();

if (isset($_COOKIE['key'])) {

//    var_dump($_COOKIE['key']);
    $gDrive->accessToker($_COOKIE['key'], $client);
    //Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
        $gDrive->refreshToker($client);
    }
} else {
    $redirect_uri = $gDrive->getUrl();
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

