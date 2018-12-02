<?php
include_once 'View.php';

class LoginView implements View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        $login = file_get_contents('login.php');
        //echo $homepage;
        return $login;
    }
}
?>