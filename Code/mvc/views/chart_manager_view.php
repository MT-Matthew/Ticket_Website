<?php

if (isset($_POST['btnsave'])) {
    $year = $_POST['txt_year'];
    $month = $_POST['txt_month'];
    header("Location: http://localhost/ticketweb/chart/showChart/$month");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
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
                <h1>Doanh Thu</h1> <br>

                <form action="" method="post" enctype="multipart/form-data">

                    <select name="txt_year" class="custom-select" style="width: calc(40% - 160px);">
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                    </select>
                    <select name="txt_month" class="custom-select" style="width: calc(40% - 160px); margin-left : 10px">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>

                    <input type="submit" value="Thống Kê" name="btnsave" style="margin-left : 10px"> <br><br>

                    <!-- <table>
                        <thead>
                            <tr>
                                <th>Mã Hóa Đơn</th>
                                <th>Ngày Tạo</th>
                                <th>Đơn Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td> <?php echo $value['order_id'] ?> </td>
                                    <td> <?php echo $value['create_date'] ?> </td>
                                    <td> <?php echo $value['total'] ?> </td>
                                </tr>

                            <?php
                                $total += $value['total'];
                            } ?>
                            <tr>
                                <td></td>
                                <th>Tổng: </th>
                                <th><?php echo $total ?></th>
                            </tr>

                        </tbody>
                    </table> -->

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

    <script src="./index.js"></script>
</body>

</html>