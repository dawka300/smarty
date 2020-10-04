<?php

$status=session_status();
if (!$status=== PHP_SESSION_ACTIVE){
    session_start();
}

/*if (!isset($_SESSION['token'])){
    $_SESSION['token']=sha1(uniqid((string)mt_rand(), TRUE));
}*/

require_once 'config'.DIRECTORY_SEPARATOR.'config.php';
require_once 'helpers' . DIRECTORY_SEPARATOR . 'custom_functions.php';
require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

foreach ($data as $name=>$value){
    define($name, $value);
}

define('DS', DIRECTORY_SEPARATOR);
define('URLROOT', 'http://'.$_SERVER['HTTP_HOST']);
define('MAIN_DS', 'http://'.$_SERVER['HTTP_HOST'].DS.basename(dirname(__DIR__)));
//echo '\\';

/*require_once 'libraries'.DIRECTORY_SEPARATOR.'Core.php';
require_once 'libraries'.DIRECTORY_SEPARATOR.'Database.php';
require_once 'libraries'.DIRECTORY_SEPARATOR.'Controller.php';*/





