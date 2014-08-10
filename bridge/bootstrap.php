<?php

/*Composer autoloader and Bridge autoloader*/

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/autoloader.php";

(new Bridge\Autoloader)
    ->addNamespace('Bridge', __DIR__)
    ->register();

/*Take care of missing extensions to prevent errors*/

if (!class_exists('\Memcache')) {
    new Bridge\ExtensionsFaker\Memcache();
}

if (!class_exists('\Redis')) {
    new Bridge\ExtensionsFaker\Redis();
}

if (!class_exists('\RedisArray')) {
    new Bridge\ExtensionsFaker\RedisArray();
}

if (!class_exists('\MongoClient')) {
    new Bridge\ExtensionsFaker\MongoClient();
}

/*Identify the framework by route (we should enhance this eventually)*/

$routes = [];
if (file_exists(__DIR__ . '/routes.txt')) {
    $routes = array_filter(explode(PHP_EOL, file_get_contents(__DIR__ . '/routes.txt') . PHP_EOL));
}

$request = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$request = explode('?', $request, 2);
$request = isset($request[0]) ? rtrim($request[0], '/') : '';

$routesBypass = false;

/*don't check trailling slashe*/

if (substr($request, -1) === '/') {
    $route = substr($route, 0, -1);
}

if (!empty($routes)) {
    foreach ($routes as $route) {

        $route = trim(trim($route, '/'));

        if ($route[0] === '#' || $route[0] === ';') {

            /*skip comment*/
            continue;
        }

        /*fix missing slashe at the beggining*/

        if ($route[0] !== '/') {
            $route = '/' . $route;
        }

        if (substr($route, -1) === '*') {

            /*wildacard*/

            $route = substr($route, 0, -1);

            if (substr($request, 0, strlen($route)) === $route) {
                $routesBypass = true;
                break;
            }

        } else {

            if ($request === $route) {
                $routesBypass = true;
                break;
            }
        }
    }
}

if ($routesBypass) {

    /*Initialize Symfony2 bridge*/

    Bridge\Symfony2\Symfony2Bridge::init();

} else {

    /*Init solar bridge*/

    Bridge\Solar\SolarBridge::init();
}
