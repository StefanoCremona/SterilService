<?php
class Tray
{
   function __construct() 
    { 
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    }
    
    function __construct6($id, $type, $operationId, $operationType, $date, $trayStatus)
    {
        $this->id = $id;
        $this->type = $type;
        $this->operationId = $operationId;
        $this->operationType = $operationType;
        $this->date = $date;
        $this->trayStatus = $trayStatus;
    }
    
    public $id;
    public $type;
    public $operationId;
    public $operationType;
    public $date;
    public $trayStatus;
}

$arr = array(
    new Tray('001', 'Hernia Tray', 'AB001', 'Hernia', '10/10/2018', 'UNDER STER.'),
    new Tray('001', 'Hernia Tray', 'AB001', 'Hernia', '10/10/2018', 'UNDER STER.'),
    new Tray('001', 'Hernia Tray', 'AB001', 'Hernia', '10/10/2018', 'UNDER STER.'),
    new Tray('001', 'Hernia Tray', 'AB001', 'Hernia', '10/10/2018', 'UNDER STER.'),
    new Tray('001', 'Hernia Tray', 'AB001', 'Hernia', '10/10/2018', 'UNDER STER.'),
    new Tray('001', 'Hernia Tray', 'AB001', 'Hernia', '10/10/2018', 'UNDER STER.'),
);

echo json_encode($arr);

?>