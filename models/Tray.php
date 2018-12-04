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
    
    function __construct4($id, $originalId, $procedureId, $typeId)
    {
        $this->id = $id;
        $this->originalId = $originalId;
        $this->procedureId = $procedureId;
        $this->typeId = $typeId;
    }

    public $id;
    public $originalId;
    public $procedureId;
    public $typeId;

}
?>