<?php
$con = new mysqli('localhost', 'root', '', 'crudwe');
if (!$con) {
    die(mysqli_error($con));
}
?>