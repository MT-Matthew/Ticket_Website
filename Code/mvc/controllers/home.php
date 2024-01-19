<?php
class home extends controller
{

    public function show()
    {
        $obj1 = $this->model("location_model");
        $obj2 = $this->model("ticket_model");
        $obj3 = $this->model("user_model");
        $data1 = $obj1->ShowLocation();
        $data2 = $obj2->ShowTicket();
        $data3 = $obj3->ShowUser();
        $data4 = $obj1->ShowCountry();

        $data = array('data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'data4' => $data4);
        $this->view("home_view", $data);
    }

    public function search($value)
    {
        $obj = $this->model("home_model");
        $data = $obj->findTicket($value);

        $this->view("home_search", $data);
    }

    public function searchToday()
    {
        $obj = $this->model("home_model");
        $data = $obj->findTicketToday(date('Y-m-d'));

        $this->view("home_search", $data);
    }

    public function searchWeekend()
    {
        $obj = $this->model("home_model");
        $data = $obj->findTicketWeekend();

        $this->view("home_search", $data);
    }

    public function searchLocation($value)
    {
        $obj = $this->model("home_model");
        $data = $obj->findTicketLocation($value);

        $this->view("home_search", $data);
    }

    public function insert($ma_loaisp, $ten_loaisp, $mota_loaisp)
    {
        $obj = $this->model("productModel");
        $obj->AddProductType($ma_loaisp, $ten_loaisp, $mota_loaisp);
        header('Location: http://localhost/tmt-php/home');
    }

    public function delete($ma_loaiSP)
    {
        $obj = $this->model("productModel");
        $obj->DeleteProductType($ma_loaiSP);
        header('Location: http://localhost/tmt-php/home');
    }


    public function getProductID($ma_SP)
    {
        $obj = $this->model("productModel");
        $data = $obj->GetDetail($ma_SP);
        $this->view("productView", $data);
    }

    public function checkDiscountDate($ma_sp)
    {
        $obj = $this->model("productModel");
        return $obj->CheckDiscountDate($ma_sp);
    }

    public function getDiscountDate($ma_sp)
    {
        $obj = $this->model("productModel");
        return $obj->GetDiscountDate($ma_sp);
    }

    public function AddManager($ma_loaisp, $masp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date)
    {
        $obj = $this->model("productModel");
        $obj->AddProduct($ma_loaisp, $masp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date);
        header('Location: http://localhost/tmt-php/home');
    }

    public function DeleteManager($ma_loaiSP)
    {
        $obj = $this->model("productModel");
        $obj->DeleteProduct($ma_loaiSP);
        // header("Refresh: 0.0001; url=http://localhost/tmt-php/mvc/home");
        header('Location: http://localhost/tmt-php/home');
    }

    public function ChangeManager($ma_loaiSP)
    {
        $obj = $this->model("productModel");
        // $obj->ChangeProduct($ma_loaiSP);
        $data = $obj->ShowProductType($ma_loaiSP);
        $this->view("Change", $data);
    }

    public function GoToLogin()
    {
        $this->view("login_view");
    }
}
