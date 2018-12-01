<?php
include '../models/operationType.php';
include '../dbUtils/dbConnection.php';

$myDbHelper = new DBHelper();
$conn = $myDbHelper->getConnection();

$sql = "SELECT `id`, `code`, `name`, `desc`, `dt_creation`, `dt_cancellation` FROM `procedure_type`";
$result = mysqli_query($conn, $sql);
$arr = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($arr, new OperationType($row["id"], $row["code"], $row["name"], $row["desc"], $row["dt_creation"], $row["dt_cancellation"] ));
    }
} else {
    //echo "0 results";
}

$myDbHelper->closeConnection();

echo json_encode($arr);

?>