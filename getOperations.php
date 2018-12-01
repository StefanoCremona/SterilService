<?php
include './models/operation.php';
include './dbUtils/dbConnection.php';

$myDbHelper = new DBHelper();
$conn = $myDbHelper->getConnection();

$sql = "SELECT id, name, type, dt_creation FROM `procedure`";
$result = mysqli_query($conn, $sql);
$arr = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($arr, new Operation($row["id"], $row["name"], $row["type"], $row["dt_creation"], 5));
    }
} else {
    echo "0 results";
}

$myDbHelper->closeConnection();

echo json_encode($arr);

?>