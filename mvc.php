<?php
//foreach (glob("views/*.php") as $filename)
//{
//    include $filename;
//}
include('views/BasicView.php');
include 'views/ErrorView.php';
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
$view = new BasicView($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    //Check if the Controller has the passed action
    if(!method_exists($controller, $_GET['action'])) {
        $view = new ErrorView();
        //echo '<html><body><h3>Action Not Allowed</h3></body></html>';
        //return;        
    } else {
        $controller->{$_GET['action']}();   
    }
}

echo $view->output();
?>