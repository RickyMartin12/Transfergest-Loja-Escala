<?php

define('ROOTDIR', dirname(__FILE__));
$action = $_REQUEST['action'];
$data = $_REQUEST;

$output = '';
switch ($action) {
    case 0:
        $output = require "includes/new-transfer/requests/json/locales.php";
        break;
    case 1:
        $output = require "includes/new-transfer/requests/json/zones.php";
        break;
    case 2:
        $output = require "includes/new-transfer/requests/json/clients.php";
        break;
    case 3:
        $output = require "includes/services/requests/json/price.php";
        break;
    case 4:
        $output = require "includes/services/requests/json/create.php";
        break;
    case 5:
        $output = require "includes/users/requests/json/create.php";
        break;
    case 6:
        $output = require "includes/users/requests/json/update.php";
        break;
    case 7:
        $output = require "includes/users/requests/json/delete.php";
        break;
    case 8:
        $output = require "includes/services/requests/json/filter.php";
        break;
    case 9:
        $output = require "includes/services/requests/json/read.php";
        break;
    case 10:
        $output = require "includes/services/requests/json/notify.php";
        break;
    case 11:
        $output = require "includes/services/requests/json/add_firebase_topic.php";
        break;
    case 12:
        $output = require "includes/services/requests/json/update.php";
        break;
    case 13:
        $output = require "includes/management/requests/json/update.php";
        break;
}
echo json_encode($output);