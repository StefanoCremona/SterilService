<?php
//foreach (glob("views/*.php") as $filename)
//{
//    include $filename;
//}
include 'views/ErrorView.php';
include 'views/OperationEditView.php';
include 'models/operation.php';

class Controller
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function operationShow() {
        //return new OperationsListView($this, $model);
    }
}

$view = new ErrorView();
if (isset($_POST['action']) && !empty($_POST['action'])) {

    $model = new Operation($_POST['operationId'], $_POST['operationName'], $_POST['operationType'], $_POST['operationDate'], 5 );
    $controller = new Controller($model);
    $view = new OperationEditView($controller, $model);//here is the login

    if (method_exists($controller, $_POST['action'])) {
        $controller->{$_POST['action']}();
    }

}

echo $view->output();
?>