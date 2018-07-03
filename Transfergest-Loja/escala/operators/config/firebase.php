<?php
    $d = explode(".",$_SERVER['HTTP_HOST']);
    return [
        'auth_key' => "AAAAsGAVTO4:APA91bFn3rXfdhQI_c8gWRH_vQEvxYxfb52cWdffLHgxZ0zXny7O4Ha9M23BZhmIQPmu0ubJKvu-KorGhxgLWJRdLzB_yvHVUWJZZVhk2cr-qmD-adQQGyMi_uOaAUUodGk_hLSjLaML",
        'icon' => "https://www.transfergest.com/images/newt.png",
        'device_token' => '',
        'topic' => $d[0] //subdomain
    ];