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
                <h1>Order Detail</h1>

                <table>
                    <thead>
                        <tr>
                            <th>ORDER ID</th>
                            <th>TICKET ID</th>
                            <th>QUANTITY</th>
                            <th>PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <td> <?php echo $value['order_id'] ?> </td>
                                <td> <?php echo $value['ticket_id'] ?> </td>
                                <td> <?php echo $value['quantity'] ?> </td>
                                <td> <?php echo $value['price'] ?> </td>
                            </tr>

                        <?php } ?>

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

    <script src="../../index.js"></script>
</body>

</html>