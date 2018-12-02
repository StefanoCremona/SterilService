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
        return "<!DOCTYPE html>
            <html>
            <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            </head>
            <body>
            <form type='post' action='operationList.php'>
            <div>
                <div>Login:</div><div><input type='text'/></div>
            </div>
            <div>
                <div>Password:</div><div><input type='text'/></div>
            </div>
            <div><input type='submit' /></div>
            </form>
            </body>
            </html>
        ";
    }
}
?>