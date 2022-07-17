<?php

namespace wfm;

use RedBeanPHP\R;

class Db
{
    use TSingleton;
    private function __construct()
    {
        $db = require_once  CONFIG . "/db.php";
        R::setup($db);
        if(!R::testConnection($db)){
           throw new \Exception("Соединение с базой <b>{$db}</b> не установлено", 500);
        }
        R::freeze(true);
        if(DEBUG){
            R::debug(true, 3);
        }
    }
}