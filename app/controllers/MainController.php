<?php
namespace app\controllers;

use wfm\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->setMeta('Главная страница', 'Кастомный фреймворк для создания быстрого интернет магазина', 'framework, php8, custom, e-commerce, store');
        $users = $this->model->getUsers();
        $this->set(compact('users'));

    }
}