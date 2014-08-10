<?php

namespace Bridge\ExtensionsFaker {

    /*we create en empty RedisArray class*/

    class RedisArray extends \Bridge\ExtensionsFaker\EmptyClass
    {
    }
}

/*make that class available everywhere*/

namespace {

    class RedisArray extends \Bridge\ExtensionsFaker\RedisArray
    {
    }
}
