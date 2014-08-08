<?php

error_reporting(E_ALL);

/*This is the main entry*/

date_default_timezone_set('America/Montreal');
define('DEFAULT_TIMEZONE_IS_SET', true);

/*composer autoloader*/

require_once __DIR__ . "/../vendor/autoload.php";

/*Symfony autoloader*/

//require_once __DIR__ . '/../app/AppKernel.php';

/*bridge autoloader*/

require_once __DIR__ . "/autoloader.php";

(new Bridge\Autoloader)->addNamespace('Bridge', __DIR__)->register();

if (!defined('LEGACY_APP')) {
    define('LEGACY_APP', true);
}

if (LEGACY_APP) {
    Bridge\Src\SrcBridge::init();
} else {
    Bridge\Solar\SolarBridge::init();
}

