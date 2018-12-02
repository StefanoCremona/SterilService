<?php
include_once 'View.php';

class ErrorView implements View
{

    public function __construct() {
    }

    public function output() {
        return '<html><body><h3>Action Not Allowed</h3></body></html>';
    }
}

?>