<?php
include '../dbUtils/dbConnection.php';
include_once '../utils/Message.php';

if (!isset($_POST['name']) || !isset($_POST['type']) || !isset($_POST['date']) || !isset($_POST['operationOriginalId'])) {
    echo json_encode(new Message(false, 'Input not set properly!'));
    return;
}

$operationOriginalId = $_POST["operationOriginalId"];
$name = $_POST["name"];
$type = $_POST["type"];
$date = $_POST["date"];
    
$myDbHelper = new DBHelper();
$conn = $myDbHelper->getConnection();

$stmt = mysqli_stmt_init($conn);
$query = "INSERT INTO `procedure` (ORIGINAL_ID, NAME, TYPE, DT_CREATION) VALUES (?, ?, ?, ?)";
mysqli_stmt_prepare($stmt, $query) or die(json_encode(new Message(false, 'Failed to prepare statement:'.mysqli_stmt_error($stmt))));
mysqli_stmt_bind_param($stmt, 'isis', $operationOriginalId, $name, $type, $date) or die(json_encode(new Message(false, 'Failed to bind variables:'.mysqli_stmt_error($stmt))));
mysqli_stmt_execute($stmt) or die(json_encode(new Message(false, 'Failed to execute statement:'.mysqli_stmt_error($stmt))));

echo json_encode(new Message(true, 'Operation successful!'));

$stmt->close();
$myDbHelper->closeConnection();


?>