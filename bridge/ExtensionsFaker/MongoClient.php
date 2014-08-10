<?php

namespace Bridge\ExtensionsFaker {

    /*we create en empty Memcache class*/

    class MongoClient extends \Bridge\ExtensionsFaker\EmptyClass
    {
    }
}

/*make that class available everywhere*/

namespace {

    class MongoClient extends \Bridge\ExtensionsFaker\MongoClient
    {
    }
}
