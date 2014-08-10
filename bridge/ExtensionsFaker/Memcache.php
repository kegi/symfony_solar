<?php

namespace Bridge\ExtensionsFaker {

    /*we create en empty Memcache class*/

    class Memcache extends \Bridge\ExtensionsFaker\EmptyClass
    {
    }
}

/*make that class available everywhere*/

namespace {

    class Memcache extends \Bridge\ExtensionsFaker\Memcache
    {
    }
}
