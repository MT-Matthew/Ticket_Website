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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="./css_home.css">
</head>

<body style="font-family: 'Poppins', sans-serif;">

    <br>

    <div class="container">

        <div class="banner-holder">
            <img class="banner" src="./public/images/R2.png" alt="">

            <div class="tittle">
                <!-- <h1 style="color: #FF0060;">The Safest Way To Buy Tickets</h1> -->
                <h1 style="color: white;">The Safest Way To Buy Tickets</h1>
            </div>
            <form action="" method="post">
                <input class="search" name="search" type="text">
            </form>
        </div>

        <div class="content">
            <br>
            <div class="gps">
                <h1 style="width:300px; color:#a3a3a3">Các đề xuất</h1>
                <form method="post" action="">
                    <select name="location_dropdown">
                        <option value="Toàn Bộ">
                            Toàn Bộ
                        </option>
                        <?php foreach ($data['data4'] as $key => $value) { ?>

                            <option value="<?php echo $value['country'] ?>">
                                <?php echo $value['country'] ?>
                            </option>

                        <?php } ?>
                    </select>

                    <input type="submit" name="submit_dropdown">
                </form>
            </div>

            <br> <br> <br>

            <div class="events">
                <h1>Khám Phá Các Sự Kiện</h1> <br>
                <div class="a" onclick="location.href='home/searchToday/today'">
                    <img src="./public/images/today.png" alt="" style="width:48px; height:48px; margin-right:16px;">
                    <div class="text" style="width: 100%; height:48px;">
                        <h3 style="height:27px;">Hôm Nay</h3>
                        <h3 style="height:24px; color:999999">Tìm các sự kiện gần bạn</h3>
                    </div>
                </div><br>
                <div class=" a" onclick="location.href='home/searchWeekend/weekend'">
                    <img src="./public/images/this-weekend.png" alt="" style="width:48px; height:48px; margin-right:16px">
                    <div>
                        <h3 style="height:27px;">Cuối Tuần</h3>
                        <h3 style="height:24px; color:999999">Xem nhưng sự kiện sắp tới cuối tuần</h3>
                    </div>
                </div> <br>
                <div class="a">
                    <img src="./public/images/browse-all.png" alt="" style="width:48px; height:48px; margin-right:16px">
                    <div>
                        <h3 style="height:27px;">Tùy Chọn</h3>
                        <h3 style="height:24px; color:999999">Chọn địa điểm, ngày & chủ đề</h3>
                    </div>
                </div> <br>
            </div>

            <br> <br> <br>

            <div class="hot">
                <h1>Các Sự Kiện Gần Bạn</h1> <br>
                <h3 style="color:999999">Tìm kiếm gần nhất

                    <?php
                    $selectedValue;
                    if (isset($_POST['submit_dropdown'])) {
                        $selectedValue = $_POST['location_dropdown'];
                        if ($selectedValue != "Toàn Bộ") {
                            echo "cho '" . $selectedValue . "'";
                        }
                    } else {
                        $selectedValue = "none";
                    }
                    ?>

                </h3>
                <br>

                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">



                        <?php
                        if ($selectedValue != "none" && $selectedValue != "Toàn Bộ") {
                            foreach ($data['data2'] as $key => $value) {
                                foreach ($data['data1'] as $key => $v1) {
                                    if ($v1['country'] == $selectedValue) {
                                        if ($value['location_id'] == $v1['location_name']) {
                        ?>
                                            <div class="swiper-slide" onclick="location.href='cart/addToCart/<?php echo $value['ticket_id'] ?>'">
                                                <div class="image">
                                                    <img src="./public/images/<?php echo $value['image'] ?>" alt="">
                                                </div>
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
                                <?php
                                        }
                                    }
                                }
                            }
                        } else if ($selectedValue == "none" || $selectedValue == "Toàn Bộ") {
                            foreach ($data['data2'] as $key => $value) { ?>
                                <div class="swiper-slide" onclick="location.href='cart/addToCart/<?php echo $value['ticket_id'] ?>'">
                                    <div class="image">
                                        <img src="./public/images/<?php echo $value['image'] ?>" alt="">
                                    </div>
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

                        <?php }
                        } ?>

                    </div>
                </div>
            </div>

            <script>
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 2.225,
                    spaceBetween: 12,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                });
            </script>

            <br> <br> <br>

            <div class="deal">
                <h1>Vé Hiện Có</h1> <br>
                <div class="deal-grid">

                    <?php
                    if ($selectedValue != "none" && $selectedValue != "Toàn Bộ") {
                        foreach ($data['data2'] as $key => $value) {
                            foreach ($data['data1'] as $key => $v1) {
                                if ($v1['country'] == $selectedValue) {
                                    if ($value['location_id'] == $v1['location_name']) {
                    ?>
                                        <div class="deal-grid-item" onclick="location.href='cart/addToCart/<?php echo $value['ticket_id'] ?>'">
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

                            <?php }
                                }
                            }
                        }
                    } else if ($selectedValue == "none" || $selectedValue == "Toàn Bộ") {
                        foreach ($data['data2'] as $key => $value) { ?>
                            <div class="deal-grid-item" onclick="location.href='cart/addToCart/<?php echo $value['ticket_id'] ?>'">
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
                    <?php }
                    } ?>

                </div>
            </div>

            <br><br>

            <div class="location">
                <h1>Các Địa Điểm</h1> <br>
                <div class="grid-container">

                    <?php foreach ($data['data1'] as $key => $value) { ?>
                        <div class="grid-item" style="position: relative;">
                            <img src="/ticketweb/public/images/<?php echo $value['image'] ?>" style="object-fit: cover;">
                            <h3 style="position: absolute; bottom: 10px; font-size: medium; background-color:1a2129; ">
                                <?php echo $value['location_name'] ?>
                            </h3>
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