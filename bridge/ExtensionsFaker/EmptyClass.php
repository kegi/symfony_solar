<?php

namespace Bridge\ExtensionsFaker;

/*This is an empty class that will return false to everything without raising exception*/

class EmptyClass
{
    public function __get($a)
    {
        return false;
    }

    public function __set($a, $b)
    {
    }

    public function __call($a, $b)
    {
        return false;
    }

    public static function __callStatic($a, $b)
    {
        return false;
    }

    public function __isset($a)
    {
        return false;
    }

    public function __unset($a)
    {
        return true;
    }
}
