<?php
namespace Bridge\Solar;

class SolarBridge
{
    /**
     * run the bridge
     */
    public static function init()
    {

        /*Solar Application*/

        define('LEGACY_APP', true);

        /*Set timezone*/

        date_default_timezone_set('America/Montreal');
        define('DEFAULT_TIMEZONE_IS_SET', true);
    }
}
