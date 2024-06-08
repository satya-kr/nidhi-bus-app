<?php 

include_once ("includes/header.php");
include_once ("config/check_auth.php");

if($isAuth) {
    header('Location: user/index.php');
}

if(isset($_POST['submit_login'])) {
    if (
        $_POST['phone'] !== "" && 
        $_POST['password'] !== ""
    ) {
        $phone = htmlentities($_POST['phone']);
        $password = htmlentities($_POST['password']);
        
        $sql = "SELECT * FROM users WHERE phone = '$phone'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result); // convert to array
            if($user['status'] > 0) {
                if(password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    $_SESSION['user']['isAuth'] = true;

                    header('Location: user/index.php');

                } else {
                    echo "<script>alert('Invalid credentials!');</script>";
                }
            } else {
                echo "<script>alert('Access Denied - User Blocked!');</script>";
            }
        } else {
            echo "<script>alert('Invalid credentials!');</script>";
        }

        
    }
}




?>


    <div class="wrapper">
        <div class="section-a">
            <div class="form-div">
                <h3 align="center">Login</h4>
                <form action="" method="POST">
                    <div class="frm-grp">
                        <label class="frm-label" for="FROM">Phone Number <font color="red">*</font></label>
                        <input type="text" name="phone" class="frm" />
                    </div>
                    <div class="frm-grp">
                        <label class="frm-label" for="FROM">Password <font color="red">*</font></label>
                        <input type="password" name="password" class="frm" />
                    </div>
                    <input type="submit" name="submit_login" class="btn-dflt w-100" value="Login" />
                    <center>
                        <br>
                        <a href="register.php">Create an account</a></center>
                </form>
            </div>
        </div>
        <?php include_once ("commans/nav-tiles.php") ?>
    </div>
    <?php include_once ("includes/footer.php") ?>