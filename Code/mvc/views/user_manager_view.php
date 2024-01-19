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
                <h1>Users List</h1>
                <table>
                    <thead>
                        <tr>
                            <th>USER ID</th>
                            <th>USER NAME</th>
                            <th>EMAIL</th>
                            <th>PASSWORD</th>
                            <th>DELETE</th>
                            <th>CHANGE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <td> <?php echo $value['user_id'] ?> </td>
                                <td> <?php echo $value['user_name'] ?> </td>
                                <td> <?php echo $value['email'] ?> </td>
                                <td> <?php echo $value['password'] ?> </td>

                                <td> <a href="user/DeleteManager/<?php echo $value['user_id']; ?>">Delete</a></td>
                                <td> <a href="user/GoToChange/<?php echo $value['user_id']; ?>">Change</a></td>
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