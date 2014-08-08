<?php
namespace Bridge\Src;

class SrcBridge
{

    /**
     * Run code on symfony !
     */
    public static function init()
    {

        /*load symfony bootstrap*/
        require_once(realpath(__DIR__ . '../../../web/app.php'));
    }
}
