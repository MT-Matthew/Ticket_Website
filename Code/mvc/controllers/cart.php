<?php
session_start();
class cart extends controller
{

    public function show()
    {
        $obj1 = $this->model("location_model");
        $obj2 = $this->model("ticket_model");
        $obj3 = $this->model("user_model");
        $data1 = $obj1->ShowLocation();
        $data2 = $obj2->ShowTicket();
        $data3 = $obj3->ShowUser();
        $data = array('data1' => $data1, 'data2' => $data2, 'data3' => $data3);
        $this->view("cart_manager_view", $data);
    }
    public function getTicketID()
    {
        $obj = $this->model("user_model");
        $data = $obj->ShowTicketID();
        $this->view("Change", $data);
    }

    /* -------------------------------------------------------------------------------------------------------------------------------------------------- */

    public function addToCart($ticket_id)
    {
        $obj = $this->model("cart_model");
        $data = $obj->GetTicketDetail($ticket_id);
        // $data2 = $obj->GetLocationDetail($data['location_id']);
        if (isset($_SESSION['cart'])) {

            if (isset($_SESSION['cart'][$ticket_id])) {
                $_SESSION['cart'][$ticket_id]['qty'] += 1;
            } else {
                $_SESSION['cart'][$ticket_id]['qty'] = 1;
            }
            $_SESSION['cart'][$ticket_id]['ticket_id'] = $data['ticket_id'];
            $_SESSION['cart'][$ticket_id]['ticket_code'] = $data['ticket_code'];
            $_SESSION['cart'][$ticket_id]['start_date'] = $data['start_date'];
            $_SESSION['cart'][$ticket_id]['price'] = $data['price'];
            $_SESSION['cart'][$ticket_id]['image'] = $data['image'];


            if ($obj->checkDiscountDate($data['ticket_id'])) {
                $discount = $obj->getDiscountDate($data['ticket_id']);
                // $price = $data['price'] * (1 - ($discount / 100));
                $_SESSION['cart'][$ticket_id]['discount'] = $discount;
            } else {
                $_SESSION['cart'][$ticket_id]['discount'] = 0;
            }


            $_SESSION['cart'][$ticket_id]['location_name'] = $data['location_id'];
            $_SESSION['cart'][$ticket_id]['type'] = $data['type'];
        } else if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$ticket_id]['ticket_id'] = $data['ticket_id'];
            $_SESSION['cart'][$ticket_id]['ticket_code'] = $data['ticket_code'];
            $_SESSION['cart'][$ticket_id]['qty'] = 1;
            $_SESSION['cart'][$ticket_id]['start_date'] = $data['start_date'];
            $_SESSION['cart'][$ticket_id]['price'] = $data['price'];
            $_SESSION['cart'][$ticket_id]['image'] = $data['image'];


            if ($obj->checkDiscountDate($data['ticket_id'])) {
                $discount = $obj->getDiscountDate($data['ticket_id']);
                // $price = $data['price'] * (1 - ($discount / 100));
                $_SESSION['cart'][$ticket_id]['discount'] = $discount;
            } else {
                $_SESSION['cart'][$ticket_id]['discount'] = 0;
            }



            $_SESSION['cart'][$ticket_id]['location_name'] = $data['location_id'];
            $_SESSION['cart'][$ticket_id]['type'] = $data['type'];
        }
        header("refresh:0.001; url=http://localhost/ticketweb/cart/getListAddToCart");
    }

    public function getListAddToCart()
    {
        if (isset($_SESSION['cart'])) {
            $this->view("cart_manager_view", $_SESSION['cart']);
        }
    }


    public function ReduceOnCart($ticket_id)
    {
        $obj = $this->model("productModel");
        if (isset($_SESSION['cart'][$ticket_id]) && $_SESSION['cart'][$ticket_id]['qty'] > 1) {
            $_SESSION['cart'][$ticket_id]['qty'] -= 1;
        } else if ($_SESSION['cart'][$ticket_id]['qty'] == 1) {
            unset($_SESSION['cart'][$ticket_id]);
        }
        header("refresh:0.001; url=http://localhost/ticketweb/cart/getListAddToCart");
    }

    public function DeleteOnCart($ticket_id)
    {
        if (array_key_exists($ticket_id, $_SESSION['cart'])) {
            unset($_SESSION['cart'][$ticket_id]);
        }
        header("refresh:0.001; url=http://localhost/ticketweb/cart/getListAddToCart");
    }

    public function Buy($tenkh, $diachi_lienhe, $diachi_giaohang, $num, $maKM)
    {
        $obj = $this->model("order_model");

        $tongtien = 0;
        $create_date = date('Y-m-d');
        $maHD = $tenkh . date('dmY') . $num;
        $maKH = $tenkh . $num . date('dmY');
        foreach ($_SESSION['cart'] as $key => $value) {
            $tongtien += $value['qty'] * $value['price'];
        }

        $obj->AddOrder($maHD, $create_date, $tongtien, $maKH);

        foreach ($_SESSION['cart'] as $key => $value) {
            $obj->AddOrderDetail($maHD, $value['ticket_id'], $value['qty'], $value['price']);
        }

        foreach ($_SESSION['cart'] as $key => $value) {
            unset($_SESSION['cart'][$value['ticket_id']]);
        }

        header("refresh:0.001; url=http://localhost/ticketweb/cart/getListAddToCart");
    }
}
