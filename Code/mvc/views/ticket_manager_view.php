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
                <h1>Tickets List</h1> <br>
                <button onclick="location.href='ticket/GoToAdd'">ADD</button> <br><br>

                <table>
                    <thead>
                        <tr>
                            <th>TICKET ID</th>
                            <th>TICKET CODE</th>
                            <th>LOCATION ID</th>
                            <th>START DATE</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>TYPE</th>
                            <th>IMAGE</th>

                            <th>DELETE</th>
                            <th>CHANGE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <td> <?php echo $value['ticket_id'] ?> </td>
                                <td> <?php echo $value['ticket_code'] ?> </td>
                                <td> <?php echo $value['location_id'] ?> </td>
                                <td> <?php echo $value['start_date'] ?> </td>
                                <td> <?php echo $value['price'] ?> </td>
                                <td> <?php echo $value['quantity'] ?> </td>
                                <td> <?php echo $value['type'] ?> </td>
                                <td><img src="/ticketweb/public/images/<?php echo $value['image'] ?>" style="width: 100px; margin-left: auto; margin-right: auto;"></td>

                                <td> <a href="ticket/DeleteManager/<?php echo $value['ticket_id']; ?>">Delete</a></td>
                                <td> <a href="ticket/GoToChange/<?php echo $value['ticket_id']; ?>">Change</a></td>
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