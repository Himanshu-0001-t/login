<?php

$server = 'localhost';
$user = "root";
$password = "";
$database = 'session';

$conn = mysqli_connect($server, $user, $password, $database);

// CREATE DATABASE 
// $sql = "CREATE DATABASE session";
// mysqli_query($conn, $sql);


// CREATE TABLE
// $sql = "CREATE TABLE `session`.`User` (`ID` INT NOT NULL AUTO_INCREMENT , `NAME` VARCHAR(15) NOT NULL , `EMAIL` VARCHAR(20) NOT NULL , `PASSWORD` VARCHAR(20) NOT NULL , PRIMARY KEY (`ID`), UNIQUE `name` (`NAME`)) ENGINE = InnoDB;
// ";
// mysqli_query($conn, $sql);



?>