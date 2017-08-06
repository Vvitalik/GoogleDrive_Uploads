<?php

namespace interfaces;

interface GoogleDriveInterface{

    public function createClient();

    public function accessToker($key, $client);

    public function refreshToker($client);

}