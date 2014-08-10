<?php
namespace Bridge\Symfony2;

class Symfony2Bridge
{
    /**
     * run the bridge
     */
    public static function init()
    {

        /*Symfony Application*/

        define('LEGACY_APP', false);
    }

    public static function run()
    {

        /*load symfony bootstrap*/
        require_once(realpath(__DIR__ . '/../../web/app.php'));
    }
}
