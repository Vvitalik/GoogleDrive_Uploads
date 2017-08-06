<?php
require_once "autorize.php";
require_once 'classes/ManageFileClass.php';
require_once 'classes/GoogleDriveClass.php';

if(isset($_GET["file_id"])) {

    $driveClass = new \classes\GoogleDriveClass();
    $redirectUrl = $driveClass->getUrl();

    $manageClass = new \classes\ManageFileClass();
    $deleteFile = $manageClass->deleteFile($client);

    header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));

}