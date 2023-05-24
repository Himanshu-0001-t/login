<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "foram";

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    echo mysqli_connect_error();
    die;
}

?>