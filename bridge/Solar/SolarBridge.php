<?php
namespace Bridge\Solar;

class SolarBridge
{
    public static function init()
    {
        global $app_name;
        $GLOBALS['app_name'] = $app_name = 'mv_ota_fhub_desktop';
        $GLOBALS['site_language'] = 'en';

        if (is_file(__DIR__ . "/../../legacy/solar/docroots/index.php")) {
            require_once __DIR__ . "/../../legacy/solar/docroots/index.php";
        }
    }
}