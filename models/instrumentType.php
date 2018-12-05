<?php
class InstrumentType
{
    function __construct() 
    { 
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    }
    
    function __construct3($id, $code, $name)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
    }
    function __construct4($id, $code, $name, $desc)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->desc = $desc;
    }
    
    public $id;
    public $code;
    public $name;
    public $desc;
    public $dtcreation;
    public $dtannull;

}
?>