<?php
class Operation
{
   function __construct() 
    { 
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    }
    
    function __construct5($id, $name, $type, $date, $trays)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->date = $date;
        $this->trays = $trays;
    }
    
    public $id;
    public $name;
    public $type;
    public $date;
    public $trays;
}

$arr = array(
    new Operation('001', 'My Hernia', 'Hernia', '10/10/2018', 5),
    new Operation('002', 'Your Hernia', 'Hernia', '10/12/2018', 4),
    new Operation('003', 'Her Hernia', 'Hernia', '10/11/2017', 5),
    new Operation('004', 'Their Hernia', 'Hernia', '09/09/2018', 5)
);

echo json_encode($arr);

?>