<?php 
include_once ("includes/header.php");

if(!$isAuth) {
    header('Location: ../login.php');
}

// get bus data logic
$sql  = "SELECT * FROM buses";
$allBusResult = mysqli_query($conn, $sql);



//get edit bus data
$isEdit = (isset($_GET['id']) && !empty($_GET['id'])) ? true : false;
if($isEdit) {
    $busId = $_GET['id'];
    $sql = "SELECT * FROM buses WHERE id = '$busId'";
    $result = mysqli_query($conn, $sql);
    $bus = mysqli_fetch_assoc($result);
    
}


if(isset($_POST['add_or_update_bus_submit'])) {

    $name = $_POST['name'];
    $busNo = $_POST['bus_no'];
    $type = $_POST['type'];
    $busId = $isEdit && isset($_POST['update_bus_id']) && !empty($_POST['update_bus_id']) ? $_POST['update_bus_id'] : null;

    if($busId) {
        $sql = "UPDATE buses SET name = '$name', bus_no = '$busNo', type = '$type' WHERE id = '$busId'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script>alert('Bus updated successfully!');</script>";
            echo "<script>window.location.href = '". $BASE_URL ."/admin/add-bus.php';</script>";
        } else {
            echo "<script>alert('Something went wrong!');</script>";
            echo "<script>window.location.href = '". $BASE_URL ."/admin/add-bus.php';</script>";
        }
    } else {
        // add bus logic
        $sql = "INSERT INTO buses (name, bus_no, type) VALUES ('$name', '$busNo', '$type')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script>alert('Bus added successfully!');</script>";
            echo "<script>window.location.href = '". $BASE_URL ."/admin/add-bus.php';</script>";
            } else {
            echo "<script>alert('Something went wrong!');</script>";
            echo "<script>window.location.href = '". $BASE_URL ."/admin/add-bus.php';</script>";
        }
    }



    // update bus
}

// delete bus
if(isset($_POST['delete_bus'])) {
    $busId = $_POST['bus_id'];
    $sql = "DELETE FROM buses WHERE id = '$busId'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Bus deleted successfully!');</script>";
        echo "<script>window.location.href = '". $BASE_URL ."/admin/add-bus.php';</script>";
        } else {
        echo "<script>alert('Something went wrong!');</script>";
        echo "<script>window.location.href = '". $BASE_URL ."/admin/add-bus.php';</script>";
    }
}





?>
<div style="display: flex;width: 100%;height:100%;justify-content: center;align-items:center">
    <div style="width: 80%; margin-top: 40px; padding: 20px; background: #ffffff; display: flex;">
        <fieldset style="flex:2;">
            <legend>Add Bus</legend>
            <form action="" method="POST" >
                <?php if($isEdit): ?>
                    <input type="hidden" name="update_bus_id" value="<?= $bus['id'] ?>" />
                <?php endif; ?>
                <label>Name</label><br>
                <input type="text" name="name" style="width: 200px;" required value="<?= $isEdit ? $bus['name'] : '' ?>" />
                <br>
                <br>
                <label>Bus Number</label><br>
                <input type="text" name="bus_no" style="width: 200px;" required value="<?= $isEdit ? $bus['bus_no'] : '' ?>" />
                <br>
                <br>
                <label>Bus Type</label><br>
                <select name="type" style="width: 208px;">
                    <option value="">-- Select --</option>
                    <option value="AC" <?= $isEdit && $bus['type'] == 'AC' ? 'selected' : '' ?>>AC</option>
                    <option value="NON AC" <?= $isEdit && $bus['type'] == 'NON AC' ? 'selected' : '' ?>>Non AC</option>
                </select>
                <br>
                <br>
                <input type="submit" name="add_or_update_bus_submit" value="SAVE" /><br>
            </form>
        </fieldset>
        <fieldset style="flex:8;">
            <legend>Bus List</legend>

            <table border="1" bordercolor="black" cellspacing="0" cellpadding="5" width="100%">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Bus Number</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th style="width: 160px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(mysqli_num_rows($allBusResult) > 0): 
                        while($row = mysqli_fetch_assoc($allBusResult)):
                    ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['bus_no'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['type'] ?></td>
                            <td style="display:flex;">
                                <a href="add-bus.php?id=<?= $row['id'] ?>">EDIT</a>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <form action="" method="POST">
                                    <input type="hidden" name="bus_id" value="<?= $row['id'] ?>" />
                                    <input type="submit" name="delete_bus" value="DELETE" />
                                </form>
                            </td>
                        </tr>
                    <?php 
                        endwhile;    
                    else: 
                    ?>
                        <tr>
                            <td colspan="5">No data found!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </fieldset>
    </div>
</div>
