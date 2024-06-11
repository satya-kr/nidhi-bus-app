<?php 
include_once ("includes/header.php");
include_once ("config/check_auth.php");

if($isAuth) {
    header('Location: user/index.php');
}


if(isset($_POST['submit_register'])) { 
    if(
        $_POST['name'] !== "" &&
        $_POST['phone'] !== "" &&
        $_POST['password'] !== "" &&
        $_POST['c_password'] !== ""
    ) {
        $name = htmlentities($_POST['name']);
        $phone = htmlentities($_POST['phone']);
        $password = htmlentities($_POST['password']);
        $c_password = htmlentities($_POST['c_password']);

        if($password === $c_password) {

            $checkPhone = "select  * from users where phone = '$phone'";
            $result = mysqli_query($conn, $checkPhone);

            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('Phone number already exists!');</script>";
            } else {
                $hashedPassword = password_hash($c_password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (name, phone, password) VALUES ('$name', '$phone', '$hashedPassword')";
                
                $query = mysqli_query($conn, $sql);
                if($query) {
                    echo "<script>alert('User registered successfully!');</script>";
                    echo "<script>window.location.href = 'login.php';</script>";
                } else {
                    echo "<script>alert('Something went wrong!');</script>";
                }
            }
        } else {
            echo "<script>alert('Confirm password does not match');</script>";
        }

    } else {
        echo "<script>alert('All fields are required!');</script>";
    }
}


?>
    <style>
        .section-a {
            height: 500px;
        }
    </style>

    <div class="wrapper">
        <div class="section-a">
            <div class="form-div">
                <h3 align="center">Login</h4>
                <form action="" method="POST">
                    <div class="frm-grp">
                        <label class="frm-label" for="FROM">Name <font color="red">*</font></label>
                        <input type="text" name="name" class="frm" />
                    </div>
                    <div class="frm-grp">
                        <label class="frm-label" for="FROM">Phone Number <font color="red">*</font></label>
                        <input type="text" name="phone" class="frm" maxlength="10" />
                    </div>
                    <div class="frm-grp">
                        <label class="frm-label" for="FROM">Password <font color="red">*</font></label>
                        <input type="password" name="password" class="frm" />
                    </div>
                    <div class="frm-grp">
                        <label class="frm-label" for="FROM">Confirm Password <font color="red">*</font></label>
                        <input type="password" name="c_password" class="frm" />
                    </div>
                    <input type="submit" name="submit_register" class="btn-dflt w-100" value="Register" />
                    <center>
                        <br>
                        <a href="login.php">Login here</a></center>
                </form>
            </div>
        </div>
        <?php include_once ("commans/nav-tiles.php") ?>
    </div>
    <?php include_once ("includes/footer.php") ?>