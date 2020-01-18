<?php

require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$ServiceAccount = ServiceAccount::FromJsonFile( __DIR__ .'/secret/phplogin-5ae2c-709212d386f8.json');

$factory = (new Factory)
    ->withServiceAccount($ServiceAccount)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://phplogin-5ae2c.firebaseio.com');

$database = $factory->createDatabase();







?>