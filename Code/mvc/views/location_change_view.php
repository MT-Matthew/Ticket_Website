<?php

$obj = new location();


if (isset($_FILES['txt_image'])) {
    $file_name = $_FILES['txt_image']['name'];
    $file_tmp = $_FILES['txt_image']['tmp_name'];
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "public/images/" . $file_name);
    }
}

$txt_location_id = isset($_POST['txt_location_id']) ? $_POST['txt_location_id'] : "";
$txt_location_name = isset($_POST['txt_location_name']) ? $_POST['txt_location_name'] : "";
$txt_country = isset($_POST['txt_country']) ? $_POST['txt_country'] : "";
$txt_city = isset($_POST['txt_city']) ? $_POST['txt_city'] : "";

if (isset($_FILES['txt_image'])) {
    $txt_image = $_FILES['txt_image']['name'];
}


if (isset($_POST['btnsave'])) {
    if ($txt_image != "") {
        $obj->ChangeManager($txt_location_id, $txt_location_name, $txt_country, $txt_city, $txt_image);
    } else {
        $obj->ChangeNoImage($txt_location_id, $txt_location_name, $txt_country, $txt_city);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../../style.css">
    <title>Location Add</title>
</head>

<body class="dark-mode-variables">

    <div class="container">
        <!-- Sidebar Section -->
        <?php
        include("aside_left.php");
        ?>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h1>Location Change</h1>
                <?php foreach ($data as $key => $value) { ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        LOCATION ID<br>
                        <input type="text" name="txt_location_id" value="<?php echo $value['location_id']; ?>" readonly> <br><br>
                        LOCATION NAME<br>
                        <input type="text" name="txt_location_name" value="<?php echo $value['location_name']; ?>" required> <br><br>
                        COUNTRY<br>
                        <input type="text" name="txt_country" value="<?php echo $value['country']; ?>" required> <br><br>
                        CITY<br>
                        <input type="text" name="txt_city" value="<?php echo $value['city']; ?>" required> <br><br>
                        <img src="/ticketweb/public/images/<?php echo $value['image'] ?>" style="width: 100px;"> <br><br>
                        <input type="file" name="txt_image" /><br><br>

                        <input type="submit" value="Sửa" name="btnsave">

                    </form>
                <?php } ?>
            </div>
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <?php
        include("aside_right.php");
        ?>


    </div>

    <script src="../../index.js"></script>
</body>

</html>