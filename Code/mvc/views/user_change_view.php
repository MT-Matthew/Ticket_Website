<?php

$obj = new user();

$txt_user_id = isset($_POST['txt_user_id']) ? $_POST['txt_user_id'] : "";
$txt_user_name = isset($_POST['txt_user_name']) ? $_POST['txt_user_name'] : "";
$txt_email = isset($_POST['txt_email']) ? $_POST['txt_email'] : "";
$txt_password = isset($_POST['txt_password']) ? $_POST['txt_password'] : "";


if (isset($_POST['btnsave'])) {
    $obj->ChangeManager($txt_user_id, $txt_user_name, $txt_email, $txt_password);
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
                <h1>User Change</h1>
                <?php foreach ($data as $key => $value) { ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        ID Người Dùng <br>
                        <input type="text" name="txt_user_id" value="<?php echo $value['user_id']; ?>" readonly> <br><br>
                        Tên Người Dùng <br>
                        <input type="text" name="txt_user_name" value="<?php echo $value['user_name']; ?>" required> <br><br>
                        Email <br>
                        <input type="text" name="txt_email" value="<?php echo $value['email']; ?>" required> <br><br>
                        Mật Khẩu <br>
                        <input type="text" name="txt_password" value="<?php echo $value['password']; ?>" required> <br><br>

                        <input type="submit" value="Change" name="btnsave">

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