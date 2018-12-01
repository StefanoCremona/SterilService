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

?>