<?php
//These paths depend on the caller path. Be careful.
include_once './TrayType.php';
include_once '../dbUtils/dbConnection.php';

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

    function getExpectedTrays() {
        $myDbHelper = new DBHelper();
        $conn = $myDbHelper->getConnection();

        $sql = "SELECT tray_type.ID, tray_type.CODE, tray_type.NAME, TRAY_NUM 
        FROM `procedure_conf`, `tray_type` WHERE procedure_conf.TRAY_TYPE = tray_type.ID and procedure_type = ".$this->type;
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $tray_type = new TrayType($row["ID"], $row["CODE"], $row["NAME"]);
                $tray_type->num = $row["TRAY_NUM"];
                array_push($arr, $tray_type);
            }
        }

        $myDbHelper->closeConnection();

        return $arr;
    }
    
    public $id;
    public $name;
    public $type;
    public $date;
    public $trays;
}

?>