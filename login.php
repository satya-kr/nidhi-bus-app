<?php include_once ("includes/header.php") ?>


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
                    <button type="submit" class="btn-dflt w-100">
                        Login
                    </button>
                    <center>
                        <br>
                        <a href="register.php">Create an account</a></center>
                </form>
            </div>
        </div>
        <?php include_once ("commans/nav-tiles.php") ?>
    </div>
    <?php include_once ("includes/footer.php") ?>