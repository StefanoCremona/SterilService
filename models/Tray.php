<?php
include_once './models/instrumentType.php';
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

    function getActualInstruments() {
        $arr = array();
        
        $myDbHelper = new DBHelper();
        $conn = $myDbHelper->getConnection();

        $sql = "SELECT `TRAY_ID`, `INST_TYPE`, `INST_NUM` FROM `tray_set`
            WHERE TRAY_ID = ".$this->id;
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $instType = new InstrumentType($row["INST_TYPE"]);
                $instType->num = $row["INST_NUM"];
                array_push($arr, $instType);
            }
        }

        //echo json_encode($arr);

        $myDbHelper->closeConnection();

        return $arr;
    }

    function getExpectedInstruments() {
        $arr = array();
        
        $myDbHelper = new DBHelper();
        $conn = $myDbHelper->getConnection();

        $sql = "SELECT instrument_type.ID, `CODE`, `NAME`, `DESC`, `INST_NUM` FROM `tray_conf`, `instrument_type` 
            WHERE  tray_conf.INSTRUMENT_TYPE = instrument_type.ID and tray_type = ".$this->typeId;
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $instType = new InstrumentType($row["ID"], $row["CODE"], $row["NAME"], $row["DESC"]);
                $instType->num = $row["INST_NUM"];
                array_push($arr, $instType);
            }
        }

        $myDbHelper->closeConnection();

        return $arr;
    }

    public $id;
    public $originalId;
    public $procedureId;
    public $typeId;

}
?>