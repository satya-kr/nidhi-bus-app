<?php include_once ("includes/header.php") ?>
    <div class="wrapper">
        <div class="section-a">
            <div class="form-div">
                <h3 align="center">Find Your Destination</h3>
                <form action="" method="POST">
                    <div class="frm-grp">
                        <label class="frm-label" for="FROM">From:</label>
                        <select class="js-example-basic-single  frm frm-select" name="from">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="frm-grp">
                        <label class="frm-label" for="FROM">To:</label>
                        <select class="js-example-basic-single  frm frm-select" name="to">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <button type="submit" class="search btn-dflt w-100">search
                        <span class="icon">
                            <ion-icon name="search-outline" />
                        </span>
                    </button>
                </form>
            </div>
        </div>
        <?php include_once ("commans/nav-tiles.php") ?>
    </div>
<?php include_once ("includes/footer.php") ?>