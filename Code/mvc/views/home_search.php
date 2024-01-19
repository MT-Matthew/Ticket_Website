<?php


if (isset($_POST['search'])) {
    $keySearch = $_POST['search'];
    $keySearch = urlencode($keySearch);
    header("Location: http://localhost/ticketweb/home/search/$keySearch");
    exit;
}

include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
    <link rel="stylesheet" href="../../css_home.css">
</head>

<body style="font-family: 'Poppins', sans-serif;">

    <br>

    <div class="container">

        <div class="banner-holder">
            <img class="banner" src="../../public/images/R2.png" alt="">

            <div class="tittle">
                <h1 style="color: #FF0060;">The Safest Way To Buy Tickets</h1>
            </div>

            <form action="" method="post">
                <input class="search" name="search" type="text">
            </form>
        </div>

        <div class="content">
            <br>
            <div class="deal">
                <h1>Vé Hiện Có</h1> <br>
                <div class="deal-grid">
                    <?php foreach ($data as $key => $value) { ?>
                        <div class="deal-grid-item" onclick="location.href='../../cart/addToCart/<?php echo $value['ticket_id'] ?>'">
                            <div class="info">
                                <div class="text">
                                    <h5 style="color: #fe4a41; height:21px;"><i class="fa-regular fa-calendar" style="color: #fe4a49"></i> <?php echo $value['start_date'] ?></h5>
                                    <h4 style="color: white; height:27px;"><?php echo $value['ticket_code'] ?></h4>
                                    <h5 style="color: #999999;   height:21px;"><?php echo $value['location_id'] ?></h5>
                                </div>
                                <div class="ticket">
                                    <div style="width:100%; height:22px; background-color:#00b6f0; color: white; border-radius: 12px">
                                        <span class="fa-solid fa-ticket fa-rotate-90 fa-xs" style="margin-top: 10px;"></span>
                                        <?php echo $value['quantity'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
            <br>
        </div>

    </div>

</body>

</html>

<?php
include("footer.php");
?>