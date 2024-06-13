<?php 

$BASE_URL = "http://localhost/bus-app";

$DB_NAME = "busapp";
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";


$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();