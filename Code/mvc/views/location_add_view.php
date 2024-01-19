<?php

$obj = new location();

$txt_location_name = isset($_POST['txt_location_name']) ? $_POST['txt_location_name'] : "";
$txt_country = isset($_POST['txt_country']) ? $_POST['txt_country'] : "";
$txt_city = isset($_POST['txt_city']) ? $_POST['txt_city'] : "";
$txt_image = isset($_FILES['txt_image']) ? $_FILES['txt_image']['name'] : "";
if (isset($_POST['btnsave'])) {
    $obj->AddManager($txt_location_name, $txt_country, $txt_city, $txt_image);
}

if (isset($_FILES['txt_image'])) {
    $file_name = $_FILES['txt_image']['name'];
    $file_tmp = $_FILES['txt_image']['tmp_name'];
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "public/images/" . $file_name);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
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
                <h1>Location Add</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    Tên Địa Điểm <br> <input type="text" name="txt_location_name" required> <br><br>
                    Quốc Gia <br> <input type="text" name="txt_country" required> <br><br>
                    Thành Phố <br> <input type="text" name="txt_city" required> <br><br>
                    <input type="file" name="txt_image" required />
                    <br><br>

                    <input type="submit" value="Thêm" name="btnsave"> <br><br><br><br>

                </form>
            </div>
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <?php
        include("aside_right.php");
        ?>


    </div>

    <script src="../index.js"></script>
</body>

</html>