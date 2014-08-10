<?php

namespace Bridge\ExtensionsFaker {

    /*we create en empty Redis class*/

    class Redis extends \Bridge\ExtensionsFaker\EmptyClass
    {
        public function get($a, $b)
        {
            return false;
        }

        function set($a, $b, $c)
        {
            return false;
        }
    }
}

/*make that class available everywhere*/

namespace {

    class Redis extends \Bridge\ExtensionsFaker\Redis
    {
    }
}
