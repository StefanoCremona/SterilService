<?php
include_once 'View.php';

class OperationEditView implements View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        //return '<html><body><p>Operation Edit View</a></p></body></html>';
        //$view = file_get_contents('./views/OperationEditRender.php');
        //echo $view;
        //return json_encode($this->model);
        echo "
        <!DOCTYPE html>
            <html>
            <head>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='./css/main.css'>
                <script src='./js/operation.js'></script>
            </head>
            <body>
                <div id='spinner' class='itemsCentered' style='position: absolute; width: 100%; height: 100%; visibility: visible'>
                    <div class='loader'></div>
                </div>
                <h3 class='flex1 itemsCentered'>Operation Edit</h3>
                <div class='listContainer'>
                    <div class='listContainer'>
                        <div class='listRow header' >
                            <div class='idColumn'>ID</div>
                            <div class='nameColumn'>Name</div>
                            <div class='typeColumn'>Type</div>
                            <div class='dateColumn'>Date</div>
                        </div>
                        <div class='listRow odd' >
                            <div class='idColumn'>".$this->model->id."</div>
                            <div class='nameColumn'>".$this->model->name."</div>
                            <div class='typeColumn'>".$this->model->type."</div>
                            <div class='dateColumn'>".$this->model->date."</div>
                        </div>
                    </div>
                </div>
            </body>
            </html>
        ";
    }
}
?>