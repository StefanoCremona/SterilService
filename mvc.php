<?php
//foreach (glob("views/*.php") as $filename)
//{
//    include $filename;
//}
include('views/BasicView.php');
include 'views/ErrorView.php';
include 'views/LoginView.php';

include('models/BasicModel.php');

class Controller
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function clicked() {
        $this->model->string = "Updated Data, thanks to MVC and PHP!";
    }
}

$model = new BasicModel();
$controller = new Controller($model);
$view = new LoginView($controller, $model);//here is the login

if (isset($_GET['action']) && !empty($_GET['action'])) {

    if (!method_exists($controller, $_GET['action'])) {
        $view = new ErrorView();
        echo $view->output();
        return;
    }
    
    $controller->{$_GET['action']}();

}

echo $view->output();
?>