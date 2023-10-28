<?php
$con = new mysqli('localhost','root','','id20323457_courier123');
if ($con->connect_error) {
    die('Error : ('. $con->connect_errno .') '. $con->connect_error);
}
?>