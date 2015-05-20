<?php

namespace Lab5\models\services;

include_once './api/v1/models/interfaces/IService.php';
include_once './api/v1/models/helpers/RestProxy.php';

$consumeAPI = new RestProxy();

$key = 'test';
$auth = $key.':';

$method = $consumeAPI->getHTTPVerb();
$data = $consumeAPI->getHTTPData();

$url = $consumeAPI->endpoint('http://localhost/PHPAdvancedClassSpring2015/week5/Lab5/api/v1');

$consumeAPI->callAPI($method, $url, $data, $auth);