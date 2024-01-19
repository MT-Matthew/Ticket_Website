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
                <h1>Discount List</h1> <br>
                <button onclick="location.href='discount/GoToAdd'">ADD</button> <br><br>

                <table>
                    <thead>
                        <tr>
                            <th>DISCOUNT ID</th>
                            <th>TICKET ID</th>
                            <th>Discount (%)</th>
                            <th>START DATE</th>
                            <th>END DATE</th>

                            <th>DELETE</th>
                            <th>CHANGE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <td> <?php echo $value['discount_id'] ?> </td>
                                <td> <?php echo $value['ticket_id'] ?> </td>
                                <td> <?php echo $value['discount'] ?> </td>
                                <td> <?php echo $value['start_date'] ?> </td>
                                <td> <?php echo $value['end_date'] ?> </td>

                                <td> <a href="discount/DeleteManager/<?php echo $value['discount_id']; ?>">Delete</a></td>
                                <td> <a href="discount/GoToChange/<?php echo $value['discount_id']; ?>">Change</a></td>
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

    <script src="./index.js"></script>
</body>

</html>