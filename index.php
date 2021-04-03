<?php
//Autoloading classes natively
require __DIR__ . '/vendor/autoload.php';
require "FCMNotificationSenderService.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//loading envirement Variables to $_ENV and $_SERVER
$dotenv->load();

FCMNotificationSenderService::getInstance()
    ->sendMessageToDevices("Test","Hello Mr Gounane",["diz-7I0LRYSbj79270C65M:APA91bGNaRwNKsw2XqqPseACLrEQXgDMa5A2S3DdM5PxrcgRUqCtnkvIukLCXf0NGxM4ME3dVihHp63GBWSDByGqhggO3zzwreQydIY95pjJ1xFwniQhRmjfIMW-LoH1USkUePLspLTr"]);
