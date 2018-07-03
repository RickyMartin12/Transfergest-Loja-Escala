<?php

    require ROOTDIR . '/vendor/autoload.php';

    use sngrl\PhpFirebaseCloudMessaging\Client;

    $firebase_config = require ROOTDIR . '/config/firebase.php';


    $token = $data['token'];

    $server_key = $firebase_config['auth_key'];
    $client = new Client();
    $client->setApiKey($server_key);
    $client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

    $response = $client->addTopicSubscription($firebase_config['topic'], [$token]);

    return $response->getStatusCode();
