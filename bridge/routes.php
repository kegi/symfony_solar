<?php

$routes = [];
if (file_exists(__DIR__ . '/routes.txt')) {
    $routes = array_filter(explode(PHP_EOL, file_get_contents(__DIR__ . '/routes.txt') . PHP_EOL));
}

$request = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$request = explode('?', $request, 2);
$request = isset($request[0]) ? $request[0] : '';

if (in_array($request, $routes) || substr($request, 0, 3) === '/1/') {
    if (!defined('LEGACY_APP')) {
        define('LEGACY_APP', false);
    }

    require __DIR__ . '/../bootstrap/router.php';
    return true;
}

define('LEGACY_APP', true);

$subroutes = [
    '/en' => __DIR__ . "/../legacy/solar/docroots/ota_fhub_desktop/en/index.php",
    '/fr' => __DIR__ . "/../legacy/solar/docroots/ota_fhub_desktop/fr/index.php",
    '/' => __DIR__ . "/../legacy/solar/docroots/ota_fhub_desktop/index.php",
];

require_once __DIR__ . "/bootstrap.php";

$index = "/index.php";
foreach ($subroutes as $subroute => $file) {
    if (0 === strncmp($subroute, $_SERVER['REQUEST_URI'], strlen($subroute))) {
        // By pass grumpy firewall
        if ($_SERVER['REMOTE_ADDR'] === '127.0.0.1') {
            $_SERVER['REMOTE_ADDR'] = '24.37.79.206';
        }

        $_SERVER['SCRIPT_NAME'] = substr($_SERVER['SCRIPT_NAME'], (strlen($index) + strlen($subroute) - 1));
        if ($_SERVER['SCRIPT_NAME'] === false) {
            $_SERVER['SCRIPT_NAME'] = "";
        }

        require_once $file;
        break;
    }
}

return false;
