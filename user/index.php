<?php 

// include_once ("../config/db_conn.php"); 
// include_once ("../config/check_auth.php");
include_once ("includes/header.php");
if(!$isAuth) {
    header('Location: ../login.php');
}

// echo "<pre>";
// print_r($_SESSION);
?>


<h1>User Dashboard</h1>
<h2>Welcome, <?= $user['name'] ?? "" ?></h2>
<h4><?= $user['role'] ?? "" ?></h4>