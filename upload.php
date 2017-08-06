<?php

require_once "autorize.php";

require_once "classes/GoogleDriveClass.php";
require_once "classes/ManageFileClass.php";

if(isset($_POST["submit"])) {

    $googleDrive = new \classes\GoogleDriveClass();
    $redirectUrl = $googleDrive->getUrl();

    $manageFile =  new \classes\ManageFileClass();
    $uploadFile = $manageFile->uploadFile($client);

}
header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));