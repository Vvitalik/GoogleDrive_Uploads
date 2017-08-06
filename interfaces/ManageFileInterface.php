<?php

namespace interfaces;

interface ManageFileInterface{

    public function getFileList($client);

    public function uploadFile($client);

    public function deleteFile($client);

}