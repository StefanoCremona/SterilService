<?php
include '../dbUtils/dbConnection.php';
include_once '../utils/Message.php';

if (!isset($_POST['trayId']) || !isset($_POST['instTypeId']) || !isset($_POST['instNumber'])) {
    echo json_encode(new Message(false, 'Input not set properly!'));
    return;
}
    
$trayId = $_POST["trayId"];
$instTypeId = $_POST["instTypeId"];
$instNumber = $_POST["instNumber"];
    
$myDbHelper = new DBHelper();
$conn = $myDbHelper->getConnection();

$stmt = mysqli_stmt_init($conn);
$query = "INSERT INTO `tray_set` (`TRAY_ID`, `INST_TYPE`, `INST_NUM`) VALUES (?, ?, ?)";
mysqli_stmt_prepare($stmt, $query) or die(json_encode(new Message(false, 'Failed to prepare statement:'.mysqli_stmt_error($stmt))));
mysqli_stmt_bind_param($stmt, 'iii', $trayId, $instTypeId, $instNumber) or die(json_encode(new Message(false, 'Failed to bind variables:'.mysqli_stmt_error($stmt))));
mysqli_stmt_execute($stmt) or die(json_encode(new Message(false, 'Failed to execute statement:'.mysqli_stmt_error($stmt))));

echo json_encode(new Message(true, 'Operation successful!'));

$stmt->close();
$myDbHelper->closeConnection();

?>