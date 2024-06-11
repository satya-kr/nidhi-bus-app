<?php

if(!empty($_SESSION['user']) && $_SESSION['user']['isAuth'] == true) {
    
    $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['user']['id'] . "'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result); // convert to array
        if($user['status'] > 0) {
            $_SESSION['user'] = $user;
            $_SESSION['user']['isAuth'] = true;
            
            $isAuth = true;
            $userRole = $user['role'];

        } else {
            echo "<script>alert('Access Denied - User Blocked!');</script>";
            session_unset();
            header("Location: /bus-app/login.php");
        }
    } else {
        echo "<script>alert('Something went wrong!');</script>";
    }
} else {
    session_unset();
    $isAuth = false;
    $userRole = null;
}