<?php

namespace classes;

require_once '/../interfaces/ManageFileInterface.php';


use interfaces\ManageFileInterface;

class ManageFileClass implements ManageFileInterface
{
    /**
     * @param $client
     * @return \Google_Service_Drive_DriveFile
     */
    public function getFileList($client)
    {
        $drive_service = new \Google_Service_Drive($client);
        return $drive_service->files->listFiles()->getFiles();
    }

    /**
     * @param $client
     */
    public function deleteFile($client)
    {
        $driveService = new \Google_Service_Drive($client);
        $driveService->files->delete($_GET['file_id']);
    }

    /**
     * @param $client
     */
    public function uploadFile($client)
    {
        $driveService = new \Google_Service_Drive($client);
        for($i = 0; $i<count($_FILES['file']['name']);$i++) {
            $fileMetadata = new \Google_Service_Drive_DriveFile(array(
                'name' => $_FILES["file"]['name'][$i]));
            $content = file_get_contents($_FILES["file"]['tmp_name'][$i]);
            $file = $driveService->files->create($fileMetadata, array(
                'data' => $content,
                'mimeType' => 'image/jpeg',
                'uploadType' => 'multipart',
                'fields' => 'id'));
        }
    }


}