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
    
    function __construct5($id, $code, $name, $desc, $dtcreation, $dtannull)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->desc = $desc;
        $this->dtcreation = $dtcreation;
        $this->dtannull = $dtannull;
    }
    
    private $id;
    private $code;
    private $name;
    private $desc;
    private $dtcreation;
    private $dtannull;
    
    function getId() {
        return $this->id;
    }
    function getCode() {
        return $this->code;
    }
    function getName() {
        return $this->name;
    }
    function getDesc() {
        return $this->desc;
    }
    function getDtcreation() {
        return $this->dtcreation;
    }
    function getDtannull() {
        return $this->dtannull;
    }
    
    private function setId($id) {
        $this->id = $id;
    }
    public function setCode($code) {
        $this->code = $code;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setDtcreation($dtcreation) {
        $this->dtcreation = $dtcreation;
    }
    public function setDesc($desc) {
        $this->desc = $desc;
    }
    public function setDtannull($dtannull) {
        $this->dtannull = $dtannull;
    }
}
?>