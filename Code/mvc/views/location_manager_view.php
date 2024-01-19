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
                <h1>Locations List</h1> <br>
                <button onclick="location.href='location/GoToAdd'">ADD</button> <br><br>

                <table>
                    <thead>
                        <tr>
                            <th>LOCATION ID</th>
                            <th>LOCATION NAME</th>
                            <th>IMAGE</th>
                            <th>COUNTRY</th>
                            <th>CITY</th>
                            <th>DELETE</th>
                            <th>CHANGE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <td> <?php echo $value['location_id'] ?> </td>
                                <td> <?php echo $value['location_name'] ?> </td>
                                <td><img src="/ticketweb/public/images/<?php echo $value['image'] ?>" style="width: 100px; margin-left: auto; margin-right: auto;"></td>
                                <td> <?php echo $value['country'] ?> </td>
                                <td> <?php echo $value['city'] ?> </td>

                                <td> <a href="location/DeleteManager/<?php echo $value['location_id']; ?>">Delete</a></td>
                                <td> <a href="location/GoToChange/<?php echo $value['location_id']; ?>">Change</a></td>
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