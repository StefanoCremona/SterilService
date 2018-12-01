<?php
class OperationType
{
    function __construct() 
    { 
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    }
    
    function __construct6($id, $code, $name, $desc, $dtcreation, $dtannull)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->desc = $desc;
        $this->dtcreation = $dtcreation;
        $this->dtannull = $dtannull;
    }
    
    public $id;
    public $code;
    public $name;
    public $desc;
    public $dtcreation;
    public $dtannull;

}
?>