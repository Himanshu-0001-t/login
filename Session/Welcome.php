<?php
include "header.php";
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <link rel="stylesheet" href="Mystyle.css">
</head>

<body>
    <?php

    echo " <h1 class='green'>Welcome " . $_SESSION['Name'] . "</h1>"
        ?>
</body>

</html>