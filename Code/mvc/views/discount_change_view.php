<?php

$obj = new discount();

$txt_discount_id = isset($_POST['txt_ticket_id']) ? $_POST['txt_ticket_id'] : "";
$txt_ticket_id = isset($_POST['txt_ticket_code']) ? $_POST['txt_ticket_code'] : "";
$txt_discount = isset($_POST['txt_location_id']) ? $_POST['txt_location_id'] : "";
$txt_start_date = isset($_POST['txt_start_date']) ? $_POST['txt_start_date'] : "";
$txt_end_date = isset($_POST['txt_price']) ? $_POST['txt_price'] : "";


$txt_image = isset($_FILES['txt_image']) ? $_FILES['txt_image']['name'] : "";


if (isset($_POST['btnsave'])) {
    $obj->ChangeManager($txt_discount_id, $txt_ticket_id, $txt_discount, $txt_start_date, $txt_end_date);
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
                <h1>Discount Change</h1> <br>

                <?php foreach ($data as $key => $value) { ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        DISCOUNT ID <br>
                        <input type="text" name="txt_discount_id" value="<?php echo $value['discount_id']; ?>" readonly> <br><br>
                        TICKET ID <br>
                        <input type="text" name="txt_ticket_id" value="<?php echo $value['ticket_id']; ?>" required> <br><br>
                        DISCOUNT <br>
                        <input type="text" name="txt_discount" value="<?php echo $value['discount']; ?>" required> <br><br>
                        START DATE <br>
                        <input type="text" name="txt_start_date" value="<?php echo $value['start_date']; ?>" required> <br><br>
                        END DATE <br>
                        <input type="text" name="txt_end_date" value="<?php echo $value['end_date']; ?>" required> <br><br>

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