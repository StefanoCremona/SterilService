<?php
include '../dbUtils/dbConnection.php';
include_once '../utils/Message.php';

if (!isset($_POST['operationId']) || !isset($_POST['trayTypeId']) || !isset($_POST['originalId'])) {
    echo json_encode(new Message(false, 'Input not set properly!'));
    return;
}
    
$operationId = $_POST["operationId"];
$trayTypeId = $_POST["trayTypeId"];
$originalId = $_POST["originalId"];
    
$myDbHelper = new DBHelper();
$conn = $myDbHelper->getConnection();

$stmt = mysqli_stmt_init($conn);
$query = "INSERT INTO `tray` (`TRAY_TYPE`, `PROCEDURE`, `ORIGINAL_ID`) VALUES (?, ?, ?)";
mysqli_stmt_prepare($stmt, $query) or die(json_encode(new Message(false, 'Failed to prepare statement:'.mysqli_stmt_error($stmt))));
mysqli_stmt_bind_param($stmt, 'iii', $trayTypeId, $operationId, $originalId) or die(json_encode(new Message(false, 'Failed to bind variables:'.mysqli_stmt_error($stmt))));
mysqli_stmt_execute($stmt) or die(json_encode(new Message(false, 'Failed to execute statement:'.mysqli_stmt_error($stmt))));

echo json_encode(new Message(true, 'Operation successful!'));

$stmt->close();
$myDbHelper->closeConnection();


?>