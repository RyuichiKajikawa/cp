<?php

require_once('../lib/webApi.class.php');

$webApiObj = new webApi();
$uid = $_GET['uid'];

$userInfo = $webApiObj->getUserInfo($uid);

var_dump($userInfo);
