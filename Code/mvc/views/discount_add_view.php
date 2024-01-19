<?php

$obj = new discount();
$txt_ticket_id = isset($_POST['txt_ticket_id']) ? $_POST['txt_ticket_id'] : "";
$txt_discount = isset($_POST['txt_discount']) ? $_POST['txt_discount'] : "";
$txt_start_date = isset($_POST['txt_start_date']) ? $_POST['txt_start_date'] : "";
$txt_end_date = isset($_POST['txt_end_date']) ? $_POST['txt_end_date'] : "";

if (isset($_POST['btnsave'])) {
    $obj->AddManager($txt_ticket_id, $txt_discount, $txt_start_date, $txt_end_date);
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
                <h1>Discount Add</h1> <br>

                <form action="" method="post">
                    Mã SP <br>

                    <select name="txt_ticket_id">
                        <?php foreach ($data as $key => $value) {  ?>
                            <option value="<?php echo $value['ticket_id'] ?>">
                                <?php echo $value['ticket_code'] ?>
                            </option>
                        <?php } ?>
                    </select>

                    <br><br>

                    Giảm Giá ( % )<br> <input type="text" name="txt_discount" required> <br><br>
                    Ngày Bắt Đầu <br> <input type="date" name="txt_start_date" required> <br><br>
                    Ngày Kết Thúc <br> <input type="date" name="txt_end_date" required> <br><br>
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