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
        
        $actualTrays .= "
                <h3 class='flex1 itemsCentered'>Actual Trays</h3>
                <div class='listContainer'>
                    <div class='listContainer'>
                        <div class='listRow header' >
                            <div class='nameColumn'>ID</div>
                            <div class='nameColumn'>Original ID</div>
                            <div class='nameColumn'>Tray Type</div>
                        </div>
                    </div>
            ";
        //Clone the expected tray set;
        $expectedTraysFiltered = array();
        if (property_exists($this->model, 'expectedTrays')) {
            foreach ($this->model->expectedTrays as $expTray) {
                array_push($expectedTraysFiltered, clone $expTray);
            }
        }

        if(count($this->model->trays)>0) {
            
            foreach ($this->model->trays as $tray) {
                //Remove the suggested tray which  matches the actual one
                foreach ($expectedTraysFiltered as $key => $expTray) {
                    //echo $tray->type."-".$expTray->id; 
                    if ($tray->typeId == $expTray->id) {
                        if ($expTray->num > 1) {
                            $expTray->num--;
                        } else {
                            array_splice($expectedTraysFiltered, $key, 1);
                        }
                        break;
                    }
                }
                # code...
                $actualTrays.= "<div class='listRow subHeader' >
                    <div class='nameColumn'>".$tray->id."</div>
                    <div class='nameColumn'>".$tray->originalId."</div>
                    <div class='nameColumn'>".$tray->typeId."</div>
                </div>";
                $actualTrays.= "<div class='listRow Header' >
                    <div class='nameColumn'>INSTRUMENT TYPE</div>
                    <div class='nameColumn'>INSTRUMENT DESC</div>
                    <div class='nameColumn'>EXPECTED NUMBER</div>
                </div>";
                foreach ($tray->expectedInstruments as $key => $instType) {
                    $actualTrays.= "<div class='listRow odd' >
                        <div class='nameColumn'>".$instType->code."</div>
                        <div class='nameColumn'>".$instType->desc."</div>
                        <div class='nameColumn'>".$instType->num."</div>
                    </div>";
                }
            }
            $actualTrays.="</div>";
        } else {
            $actualTrays.="<div class='listContainer'>
                        <div class='flex1 itemsCentered'>No trays on the system for the provided operation!</div>
                    </div>
                ";
        }

        $expectedTrays .= "
                <h3 class='flex1 itemsCentered'>Expected Trays</h3>
                <div class='listContainer'>
                    <div class='listContainer'>
                        <div class='listRow header' >
                            <div class='idColumn'>ID</div>
                            <div class='nameColumn'>Code</div>
                            <div class='nameColumn'>Name</div>
                            <div class='nameColumn'>Quantity</div>
                            <div class='nameColumn'>Actions</div>
                        </div>
                    </div>
            ";
        if (count($expectedTraysFiltered)>0) {
            foreach ($expectedTraysFiltered as $trayType) {
                # code...
                $expectedTrays.= "<div class='listRow odd' >
                    <div class='idColumn'>".$trayType->id."</div>
                    <div class='nameColumn'>".$trayType->code."</div>
                    <div class='nameColumn'>".$trayType->name."</div>
                    <div class='nameColumn'>".$trayType->num."</div>
                    <div class='nameColumn'>
                        <input placeholder='YOUR TRAY ID' type='text' id='originalTrayId".$trayType->id."' name='originalTrayId'/>
                        <input type='hidden' id='originalTrayType' name='originalTrayType' />
                        <input type='button' value='Associate Tray' onClick=\"saveTray(".$this->model->id.", ".$trayType->id.", document.getElementById('originalTrayId".$trayType->id."').value)\"/>
                    </div>
                </div>";
            }
            $expectedTrays.="</div>";
        } else {
            $expectedTrays.="<div class='listContainer'>
                        <div class='flex1 itemsCentered'>No trays configuration on the system for the provided operation or you provided all the expected trays!</div>
                    </div>
                ";
        }
        
        echo "
        <!DOCTYPE html>
            <html>
            <head>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='./css/main.css'>
                <script src='./js/operation.js'></script>
            </head>
            <body onload='hideSpinner()'>
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
                ".$expectedTrays.$actualTrays."
            </body>
            </html>
        ";
    }
}
?>