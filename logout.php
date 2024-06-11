<?php 

include_once ("includes/header.php");
include_once ("config/check_auth.php");

if($isAuth) {
    session_unset();
    header('Location: index.php');
}

?>