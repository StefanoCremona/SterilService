<?php
//foreach (glob("views/*.php") as $filename)
//{
//    include $filename;
//}
include 'views/ErrorView.php';
include 'views/OperationEditView.php';
include 'models/operation.php';

require_once '/home/sc1984h/public_html/SterilService/dbUtils/dbConnection.php';
require_once '/home/sc1984h/public_html/SterilService/models/TrayType.php';

class Controller
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function operationShow() {
        $this->model->expectedTrays = $this->model->getExpectedTrays();
        $this->model->trays = $this->model->getTrays();
        foreach ($this->model->trays as $key => $tray) {
            $tray->expectedInstruments = $tray->getExpectedInstruments();
            $tray->actualInstruments = $tray->getActualInstruments();
        }
        //return new OperationsListView($this, $model);
    }

    public function trayAdd() {

    }
}

$view = new ErrorView();
if (isset($_POST['action']) && !empty($_POST['action'])) {

    $model = new Operation($_POST['operationId'], $_POST['operationName'], $_POST['operationType'], $_POST['operationDate']);
    $controller = new Controller($model);
    $view = new OperationEditView($controller, $model);//here is the login

    if (method_exists($controller, $_POST['action'])) {
        $controller->{$_POST['action']}();
    }

}

echo $view->output();
//echo json_encode($model->trays);
?>