<?php

require ROOTDIR . '/vendor/autoload.php';

use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Topic;
use sngrl\PhpFirebaseCloudMessaging\Notification;

$id = $data['id'];
$type = $data['type'];

$service = require ROOTDIR . '/includes/services/requests/json/read.php';
$firebase_config = require ROOTDIR . '/config/firebase.php';

$TITLE = 'Novo serviço' . " #" . $service['id'];
$BODY = $service['operador'] . "\n";
$BODY .= $service['pax'] > 1 ? $service['pax'] . " pessoas" : $service['pax'] . " pessoa";
$BODY .= "\n";
$BODY .= $service['local_recolha'] . " - " . $service['local_entrega'] . "\n";
$BODY .= date('d/m/Y H:i:s', $service['hrs']);

$URL = "localhost/index.php?service=" . $service['id'] . "&type=" . $type;
if ($_SERVER['HTTP_HOST'] != "localhost") {
    $URL = "https://" . $_SERVER['HTTP_HOST'] . "/index.php?service=" . $service['id'] . "&type=" . $type;
}

$AUTH_KEY = $firebase_config['auth_key'];
$DEVICE_TOKEN = $firebase_config['device_token'];


$server_key = $AUTH_KEY;
$client = new Client();
$client->setApiKey($server_key);
$client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

$message = new Message();
$message->setPriority('high');

if (isset($firebase_config['topic']) && !empty($firebase_config['topic'])) {
    $message->addRecipient(new Topic($firebase_config['topic']));
} else {
    $message->addRecipient(new Device($DEVICE_TOKEN));
}

$notification = new Notification($TITLE, $BODY);
$notification->setIcon($firebase_config['icon']);
$notification->setClickAction($URL);

$message
    ->setNotification($notification)
    ->setData([
        'service' => $service['id'],
        'type' => $type
    ]);
$response = $client->send($message);

return $response->getStatusCode();