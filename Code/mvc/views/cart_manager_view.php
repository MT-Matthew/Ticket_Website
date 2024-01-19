<?php

include("header.php");


if (!isset($_SESSION['num'])) {
    $_SESSION['num'] = 0;
}
$obj = new cart();
$totalPrice = 0;
foreach ($_SESSION['cart'] as $key => $value) {
    if ($value['discount']) {
        $totalPrice += (($value['price'] - ($value['price'] * $value['discount'] / 100)) * $value['qty']);
    } else {
        $totalPrice += $value['price'] * $value['qty'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css_home.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>Document</title>
</head>

<body style="font-family: 'Poppins', sans-serif; font-size: 0.88rem; color:white;">

    <div class="parent-container">
        <div class="table-container" style="margin-top: 100px;">
            <table class="table-main">
                <tr>
                    <td>Hình Ảnh</td>
                    <td>Mã Sản Phẩm</td>
                    <td>Địa Điểm</td>
                    <td>Ngày Bắt Đầu</td>
                    <td>Số Lượng</td>
                    <td>Đơn Giá</td>
                    <td>Giảm Giá</td>
                    <td>Xóa</td>
                </tr>


                <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                    <tr>
                        <td> <img src="/ticketweb/public/images/<?php echo $value['image'] ?>" width="100"> </td>
                        <td> <?php echo $value['ticket_code'] ?> </td>
                        <td> <?php echo $value['location_name'] ?> </td>
                        <td> <?php echo $value['start_date'] ?> </td>

                        <td>
                            <div class="quantity-selector">
                                <button type="button" onclick="location.href='ReduceOnCart/<?php echo $value['ticket_id'] ?>'">-</button>
                                <input type="text" name="qty[<?php echo $value['ticket_id'] ?>]" value="<?php echo $value['qty']; ?>" readonly class="qty-input">
                                <button type="button" onclick="location.href='addToCart/<?php echo $value['ticket_id'] ?>'">+</button>
                            </div>
                        </td>
                        <td> <?php echo number_format($value['price'], 0, ',', '.'); ?> ₫ </td>
                        <td> <?php echo number_format($value['discount'], 0, ',', '.'); ?> % </td>
                        <td>
                            <a href="DeleteOnCart/<?php echo $value['ticket_id']; ?>" class="delete-icon" title="Xóa" style="color:white;">x</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
        <div class="table-container2" style="margin-top: 100px;">
            <h2 class="summary-heading">Summary </h2>
            <div class="summary-item">
                <span>ProDuct</span>
                <span>
                    <td colspan="5"></td>
                    <td><?php echo number_format($totalPrice, 0, ',', '.'); ?> ₫</td>
                    </tr>
                </span>
            </div>
            <div class="summary-item">
                <span>Total (including VAT, 5%)</span>
                <span>
                    <td colspan="5"></td>
                    <td><?php
                        $VAT = $totalPrice + ($totalPrice * 5 / 100);
                        echo number_format($VAT, 0, ',', '.');
                        ?> ₫</td>
                    </tr>
                </span>
            </div>
            <h3 class="user-header">INFORMATION USER </h3>
            <h3 class="user-info">
                <td></td> <!-- Empty cell for the "Xóa" column -->
                </tr>
                <form action="" method="post" enctype="multipart/form-data">

                    Tên khách hàng <br> <input type="text" name="txt_ten_kh" required> <br><br>
                    Điện thoại <br> <input type="text" name="txt_dienthoai" required> <br><br>
                    Email <br> <input type="text" name="txt_email" required> <br><br>
                    Địa chỉ liên hệ <br> <input type="text" name="txt_dc_lh" required> <br><br>
                    Địa chỉ giao hàng <br> <input type="text" name="txt_dc_gh" required> <br><br>

        </div>
    </div>
    </h3>

    <br><br>
    <div style="margin-top: 20px; text-align: center;">
        <button onclick="window.location.href='http://localhost/ticketweb/home'" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; margin-right: 10px; cursor: pointer; border-radius: 5px;">
            <i class="material-icons sharp"></i> Continue Shopping
        </button>
        <input type="submit" value="Go To Checkout" name="btnsave" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px;">

    </div>


    </div>

</body>

</html>

<?php

?>


<?php
$txt_ma_kh = isset($_POST['txt_ma_kh']) ? $_POST['txt_ma_kh'] : "";
$txt_ten_kh = isset($_POST['txt_ten_kh']) ? $_POST['txt_ten_kh'] : "";
$txt_dienthoai = isset($_POST['txt_dienthoai']) ? $_POST['txt_dienthoai'] : "";
$txt_email = isset($_POST['txt_email']) ? $_POST['txt_email'] : "";
$txt_dc_lh = isset($_POST['txt_dc_lh']) ? $_POST['txt_dc_lh'] : "";
$txt_dc_gh = isset($_POST['txt_dc_gh']) ? $_POST['txt_dc_gh'] : "";
$txt_khuyenmai = isset($_POST['txt_khuyenmai']) ? $_POST['txt_khuyenmai'] : "";
$txt_ma_hd = isset($_POST['txt_ma_hd']) ? $_POST['txt_ma_hd'] : "";
if (isset($_POST['btnsave'])) {
    // if (isset($_POST['txt_khuyenmai'])) {
    //     if (!($obj->CheckDiscount($txt_khuyenmai))) {
    //         echo "Mã Không Hợp Lệ";
    //     } else {
    //         $obj->Buy($txt_ten_kh, $txt_dienthoai, $txt_email, $txt_dc_lh, $txt_dc_gh, $_SESSION['num'], $txt_khuyenmai);
    //         $_SESSION['num'] += 1;
    //     }
    // } else {
    //     $obj->Buy($txt_ten_kh, $txt_dienthoai, $txt_email, $txt_dc_lh, $txt_dc_gh, $_SESSION['num'], $txt_khuyenmai);
    //     $_SESSION['num'] += 1;
    // }
    $obj->Buy($txt_ten_kh, $txt_dc_lh, $txt_dc_gh, $_SESSION['num'], $txt_khuyenmai);
    $_SESSION['num'] += 1;
}
?>
</div>
</table>
<br><br><br><br><br><br><br><br>

</form>
<?php include("footer.php"); ?>
<style>
    th,
    td {
        padding: 2px;
        text-align: center;
        /* Centers the content of the cells */
    }

    th {
        background-color: #007bff;
        /* Primary brand color */
        color: white;
        text-transform: uppercase;
    }

    /* Set the width for each column if you know them, for example: */
    th:nth-child(1),
    td:nth-child(1) {
        width: 10%;
    }

    /* Adjust the width as needed */
    th:nth-child(2),
    td:nth-child(2) {
        width: 20%;
    }

    /* Adjust the width as needed */
    /* Add more nth-child selectors as per the number of columns you have. */

    /* Add a border around the entire table */
    table {

        width: 99%;
        margin: 20px 20px 20px 10px;
        /* top, right, bottom, left margins */

        table-layout: fixed;
        /* Allows for even spacing */
        /* Add additional styling here */
    }

    .quantity-selector {
        display: inline-flex;
        align-items: stretch;
        border: 1px solid #000;
        /* Black border around the quantity selector */
        border-radius: 4px;
        /* Rounded corners */
        overflow: hidden;
        /* Ensures that child elements do not break the roundness */
    }

    .quantity-selector button {
        background-color: #000;
        /* Black background for buttons */
        color: #fff;
        /* White text color */
        border: none;
        /* No borders for the buttons */
        width: 30px;
        /* Fixed width */
        height: 30px;
        /* Fixed height */
        font-size: 16px;
        /* Text size */
        line-height: 30px;
        /* Center the '-' and '+' vertically */
        padding: 0;
        /* Remove padding */
        cursor: pointer;
        /* Cursor indicates clickable item */
        flex-shrink: 0;
        /* Prevent button from shrinking */
    }

    .quantity-selector input {
        width: 30px;
        /* Width of the quantity display */
        height: 30px;
        /* Height must match buttons */
        border: none;
        /* No border */
        text-align: center;
        /* Center text */
        font-size: 16px;
        /* Text size */
        line-height: 30px;
        /* Align text vertically */
        color: #000;
        /* Black text color */
    }

    /* Remove spinner from input type number */
    .quantity-selector input[type='number']::-webkit-inner-spin-button,
    .quantity-selector input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    /* Styling for hover state on buttons */
    .quantity-selector button:hover {
        background-color: #333;
        /* Darken button on hover */
    }

    .delete-icon {
        text-decoration: none;
        color: black;
        /* or any color you prefer */
        font-size: 18px;
        /* adjust as needed */
        display: inline-block;
        padding: 8px;
        /* gives some space around the icon */
        transition: color 0.3s ease;
    }

    .delete-icon:hover {
        color: red;
        /* color when hovered over */
    }

    body {
        background-color: #17161a;
        /* background-image: url('../public/images/background1.jpg'); */
        background-size: cover;
        /* Cover the entire page */
        background-repeat: no-repeat;
        /* Do not repeat the image */
        background-attachment: fixed;
        /* The background is fixed with regard to the viewport */
    }

    .table-container {
        margin-top: 200px;
        color: white;
        background-color: #17161a;
        /* Grey background */
        padding: 20px;
        /* Adds some space around the table */
        border-radius: 10px;
        /* Optional: Rounds the corners */
        box-shadow: 0px 0px 10px #ccc;
        /* Optional: Adds a subtle shadow */

        width: 40%;
        /* Adjust the width as needed */
        margin: 30px 20px 20px 20px;
        flex: 7;
    }

    .table-container2 {
        background-color: #17161a;
        /* Grey background */
        border-radius: 10px;
        /* Optional: Rounds the corners */
        box-shadow: 0px 0px 10px #ccc;
        /* Optional: Adds a subtle shadow */

        width: 40%;
        /* Adjust the width as needed */
        margin: 30px 20px 10px 20px;
        flex: 2.5;
    }

    .parent-container {
        display: flex;
        /* Establish flexbox layout */
        align-items: flex-start;
    }

    .summary-heading {
        text-align: center;
        padding-bottom: 10px;
        /* Space between the text and the line */
        /* Add any other styling you need */
    }

    .user-info {
        text-align: left;
        padding-left: 40px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .user-header {
        text-align: center;
        padding-left: 3px;
        padding-top: 60px;

    }

    .user-header::after {
        content: '';
        /* Required for pseudo-elements */
        display: block;
        /* Makes the pseudo-element behave like a block */
        width: 90%;
        /* Sets the width of the line */
        height: 2px;
        /* Sets the thickness of the line */
        background-color: grey;
        /* Sets the color of the line */
        margin-top: 10px;
        /* Adds some space between the table and the line */
        margin-left: 5%;
    }

    .summary-heading::after {
        content: '';
        /* Required for pseudo-elements */
        display: block;
        /* Makes the pseudo-element behave like a block */
        width: 90%;
        /* Sets the width of the line */
        height: 2px;
        /* Sets the thickness of the line */
        background-color: grey;
        /* Sets the color of the line */
        margin-top: 10px;
        /* Adds some space between the table and the line */
        margin-left: 5%;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
        margin-left: 20px;
        margin-right: 20px;
    }

    .table-main {
        border-bottom: 2px;
    }
</style>