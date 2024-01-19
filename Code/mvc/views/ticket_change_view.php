<?php

$obj = new ticket();


if (isset($_FILES['txt_image'])) {
    $file_name = $_FILES['txt_image']['name'];
    $file_tmp = $_FILES['txt_image']['tmp_name'];
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "public/images/" . $file_name);
    }
}

$txt_ticket_id = isset($_POST['txt_ticket_id']) ? $_POST['txt_ticket_id'] : "";
$txt_ticket_code = isset($_POST['txt_ticket_code']) ? $_POST['txt_ticket_code'] : "";
$txt_location = isset($_POST['txt_location']) ? $_POST['txt_location'] : "";
$txt_start_date = isset($_POST['txt_start_date']) ? $_POST['txt_start_date'] : "";
$txt_price = isset($_POST['txt_price']) ? $_POST['txt_price'] : "";
$txt_status = isset($_POST['txt_status']) ? $_POST['txt_status'] : "";
$txt_quantity = isset($_POST['txt_quantity']) ? $_POST['txt_quantity'] : "";
$txt_type = isset($_POST['txt_type']) ? $_POST['txt_type'] : "";

if (isset($_FILES['txt_image'])) {
    $txt_image = $_FILES['txt_image']['name'];
}

if (isset($_POST['btnsave'])) {
    if ($txt_image != "") {
        $obj->ChangeManager($txt_ticket_id, $txt_ticket_code, $txt_location, $txt_start_date, $txt_price, $txt_status, $txt_quantity, $txt_type, $txt_image);
    } else {
        $obj->ChangeNoImage($txt_ticket_id, $txt_ticket_code, $txt_location, $txt_start_date, $txt_price, $txt_status, $txt_quantity, $txt_type);
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
                <h1>Ticket Change</h1> <br>

                <?php foreach ($data['data1'] as $key => $value) { ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        ID Vé <br>
                        <input type="text" name="txt_ticket_id" value="<?php echo $value['ticket_id']; ?>" readonly> <br><br>
                        Mã Vé <br>
                        <input type="text" name="txt_ticket_code" value="<?php echo $value['ticket_code']; ?>" required> <br><br>
                        Địa Điểm <br>

                        <select name="txt_location">
                            <option value="<?php echo $value['location_id'] ?>">
                                <?php echo $value['location_id'] ?>
                            </option>

                            <?php foreach ($data["data2"] as $key => $value2) {  ?>
                                <?php if ($value['location_id'] != $value2['location_name']) { ?>
                                    <option value="<?php echo $value2['location_name'] ?>">
                                        <?php echo $value2['location_name'] ?>
                                    </option>
                            <?php }
                            } ?>
                        </select> <br><br>

                        Ngày Bắt Đầu <br>
                        <input type="date" name="txt_start_date" value="<?php echo $value['start_date']; ?>" required> <br><br>
                        Giá Vé <br>
                        <input type="text" name="txt_price" value="<?php echo $value['price']; ?>" required> <br><br>
                        Trạng Thái <br>
                        <input type="text" name="txt_status" value="<?php echo $value['status']; ?>" required> <br><br>
                        Số Lượng <br>
                        <input type="text" name="txt_quantity" value="<?php echo $value['quantity']; ?>" required> <br><br>
                        Loại Vé <br><br>

                        <select name="txt_type">
                            <?php if ($value['type'] == 'Hòa Nhạc') { ?>
                                <option value="Hòa Nhạc">Hòa Nhạc</option>
                                <option value="Thể Thao">Thể Thao</option>
                                <option value="Triển Lãm">Triển Lãm</option>
                                <option value="Rạp">Rạp</option>
                            <?php } else if ($value['type'] == 'Thể Thao') { ?>
                                <option value="Thể Thao">Thể Thao</option>
                                <option value="Hòa Nhạc">Hòa Nhạc</option>
                                <option value="Triển Lãm">Triển Lãm</option>
                                <option value="Rạp">Rạp</option>
                            <?php } else if ($value['type'] == 'Triển Lãm') { ?>
                                <option value="Triển Lãm">Triển Lãm</option>
                                <option value="Hòa Nhạc">Hòa Nhạc</option>
                                <option value="Thể Thao">Thể Thao</option>
                                <option value="Rạp">Rạp</option>
                            <?php } else if ($value['type'] == 'Rạp') { ?>
                                <option value="Rạp">Rạp</option>
                                <option value="Hòa Nhạc">Hòa Nhạc</option>
                                <option value="Thể Thao">Thể Thao</option>
                                <option value="Triển Lãm">Triển Lãm</option>
                            <?php } ?>
                        </select>

                        <br><br>

                        <img src="/ticketweb/public/images/<?php echo $value['image'] ?>" style="width:100px"> <br>
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