<?php

namespace app\models;

use wfm\Model;
use RedBeanPHP\R;

class Main extends Model
{
    public function getUsers(){
        return R::findAll('users');
    }
}