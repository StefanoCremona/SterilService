<?php
include './models/operation.php';

$arr = array(
    new Operation('001', 'My Hernia', 'Hernia', '10/10/2018', 5),
    new Operation('002', 'Your Hernia', 'Hernia', '10/12/2018', 4),
    new Operation('003', 'Her Hernia', 'Hernia', '10/11/2017', 5),
    new Operation('004', 'Their Hernia', 'Hernia', '09/09/2018', 5)
);

echo json_encode($arr);

?>