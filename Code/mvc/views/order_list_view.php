<?php

$obj = new order();


if (isset($_POST['bntupdate'])) {
    foreach ($_POST['txt_status'] as $order_id => $newStatus) {
        $obj->updateStatus($order_id, $newStatus);
    }
    header("refresh:0.001; url=http://localhost/ticketweb/order/getOrderStatus");
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
                <h1>Orders List</h1> <br>

                <form action="" method="post" enctype="multipart/form-data">
                    <input type="submit" value="lưu" name="bntupdate"> <br><br>

                    <table>
                        <thead>
                            <tr>
                                <th>ORDER ID</th>
                                <th>CREATE DATE</th>
                                <th>TOTAL</th>
                                <th>USER ID</th>
                                <th>STATUS</th>

                                <th>DETAIL</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td> <?php echo $value['order_id'] ?> </td>
                                    <td> <?php echo $value['create_date'] ?> </td>
                                    <td> <?php echo $value['total'] ?> </td>
                                    <td> <?php echo $value['user_id'] ?> </td>
                                    <td>

                                        <select name="txt_status[<?php echo $value['order_id'] ?>]">
                                            <?php if ($value['status'] == 'Đang Xử Lý') { ?>
                                                <option value="Đang Xử Lý">Đang Xử Lý</option>
                                                <option value="Thành Công">Thành Công</option>
                                                <option value="Thất Bại">Thất Bại</option>
                                            <?php } else if ($value['status'] == 'Thành Công') { ?>
                                                <option value="Thành Công">Thành Công</option>
                                                <option value="Thất Bại">Thất Bại</option>
                                                <option value="Đang Xử Lý">Đang Xử Lý</option>
                                            <?php } else if ($value['status'] == 'Thất Bại') { ?>
                                                <option value="Thất Bại">Thất Bại</option>
                                                <option value="Thành Công">Thành Công</option>
                                                <option value="Đang Xử Lý">Đang Xử Lý</option>
                                            <?php } ?>
                                        </select>

                                    </td>

                                    <td> <a href="getOrderDetail/<?php echo $value['order_id']; ?>">Detail</a></td>
                                </tr>

                            <?php } ?>
                </form>

                </tbody>
                </table>
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