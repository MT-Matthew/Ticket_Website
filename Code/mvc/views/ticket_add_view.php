<?php

$obj = new ticket();

$txt_ticket_code = isset($_POST['txt_ticket_code']) ? $_POST['txt_ticket_code'] : "";
$txt_location = isset($_POST['txt_location']) ? $_POST['txt_location'] : "";
$txt_start_date = isset($_POST['txt_start_date']) ? $_POST['txt_start_date'] : "";
$txt_price = isset($_POST['txt_price']) ? $_POST['txt_price'] : "";
$txt_quantity = isset($_POST['txt_quantity']) ? $_POST['txt_quantity'] : "";
$txt_type = isset($_POST['txt_type']) ? $_POST['txt_type'] : "";
$txt_image = isset($_FILES['txt_image']) ? $_FILES['txt_image']['name'] : "";
if (isset($_POST['btnsave'])) {
    $obj->AddManager($txt_ticket_code, $txt_location, $txt_start_date, $txt_price, $txt_quantity, $txt_type, $txt_image);
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
    <title>Dashboard</title>
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
                <h1>Ticket Add</h1> <br>

                <form action="" method="post" enctype="multipart/form-data">
                    Mã Vé <br> <input type="text" name="txt_ticket_code" required> <br><br>
                    Địa Điểm <br>

                    <select name="txt_location">
                        <?php foreach ($data["data2"] as $key => $value) {  ?>
                            <option value="<?php echo $value['location_name'] ?>">
                                <?php echo $value['location_name'] ?>
                            </option>
                        <?php } ?>
                    </select>

                    <br><br>
                    Ngày Bắt Đầu <br> <input type="date" name="txt_start_date" required> <br><br>
                    Giá Vé <br> <input type="text" name="txt_price" required> <br><br>
                    Số Lượng Vé <br> <input type="text" name="txt_quantity" required> <br><br>
                    Loại Vé <br>

                    <select name="txt_type">
                        <option value="Hòa Nhạc">
                            Hòa Nhạc
                        </option>
                        <option value="Thể Thao">
                            Thể Thao
                        </option>
                        <option value="Triển Lãm">
                            Triển Lãm
                        </option>
                        <option value="Rạp">
                            Rạp
                        </option>
                    </select>

                    <br><br>
                    <input type="file" name="txt_image" required />
                    <br><br>

                    <input type="submit" value="Thêm" name="btnsave">

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