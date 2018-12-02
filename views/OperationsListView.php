<?php
include_once 'View.php';

class OperationsListView implements View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        $view = file_get_contents('operationList.php');
        //echo $homepage;
        return $view;
    }
}
?>