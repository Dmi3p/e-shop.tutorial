<?php

namespace ishop;

class Db {
    
    use TSingletone;
    
    private function __construct() {
        $db = require_once CONF . '/config_bd.php';
        \RedBeanPHP\R::setup($db['dsn'], $db['user'], $db['pass']);
        if(!\RedBeanPHP\R::testConnection()){
            throw new Exception("DB not connected", 500);
        }
        \RedBeanPHP\R::freeze(true);
        if(DEBUG){
            \RedBeanPHP\R::debug(true, 1);
        }
    }
}
