<?php

class productModel extends Database
{
    public function AddProductType($ma_loaisp, $ten_loaisp, $mota_loaisp)
    {
        $sql = "INSERT INTO adproducttype(ma_loaisp, ten_loaisp, mota_loaisp)
                VALUE ('$ma_loaisp', '$ten_loaisp', '$mota_loaisp')";
        $this->connect()->exec($sql);
        echo
        "Thêm thành công";
    }

    public function DeleteProductType($ma_loaisp)
    {
        $sql = "DELETE FROM adproducttype WHERE ma_loaisp='$ma_loaisp'";
        $this->connect()->exec($sql);
        echo "Xóa thành công";
    }

    public function ChangeProductType($id, $ma_loaisp, $ten_loaisp, $mota_loaisp)
    {
        $sql = "UPDATE adproducttype
                SET ma_loaisp = $ma_loaisp, ten_loaisp = $ten_loaisp, mota_loaisp = $mota_loaisp
                WHERE ma_loaisp='$id'";
        $this->connect()->exec($sql);
        echo "Sửa thành công";
    }

    public function ShowProductType()
    {
        $sql = "SELECT * FROM adproducttype";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data)) {
            echo ("");
        } else {
            return $data;
        }
    }

    public function ShowProduct()
    {
        $sql = "SELECT * FROM product";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data)) {
            echo ("");
        } else {
            return $data;
        }
    }

    public function ShowDiscount()
    {
        $sql = "SELECT * FROM khuyenmaisp";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data)) {
            echo ("");
        } else {
            return $data;
        }
    }

    public function GetDetail($ma_sp)
    {
        $sql = "SELECT * FROM product WHERE ma_sp = '$ma_sp'";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data)) {
            echo ("");
        } else {
            return $data;
        }
    }

    public function GetProductDetail($ma_sp)
    {
        $sql = "SELECT * FROM product WHERE ma_sp = '$ma_sp'";
        $stms = $this->connect()->query($sql);
        $stm = $stms->fetch();
        return $stm;
    }

    public function GetOrderDetail($maHD)
    {
        $sql = "SELECT *
                FROM orderdetail
                WHERE maHD = '$maHD'";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data)) {
            echo ("");
        } else {
            return $data;
        }
    }

    public function GetOrderList()
    {
        $sql = "SELECT * FROM orderlist";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data)) {
            echo ("");
        } else {
            return $data;
        }
    }

    public function changeStatus($maHD, $newStatus)
    {
        $sql = "UPDATE orderlist
                SET status = '$newStatus'
                WHERE maHD='$maHD'";
        $this->connect()->exec($sql);
        echo "Sửa thành công";
    }

    public function CheckDiscount($maKM)
    {
        $sql = "SELECT *
                FROM khuyenmai
                WHERE maKM='$maKM'";
        $result = $this->connect()->query($sql);
        $count = $result->fetchColumn();
        return $count;
    }

    public function CheckDiscountType($maKM)
    {
        $sql = "SELECT loaiKM
                FROM khuyenmai
                WHERE maKM='$maKM'";
        $data = $this->connect()->query($sql)->fetchColumn();
        return $data;
    }

    public function Discount($maKM)
    {
        $sql = "SELECT discount
                FROM khuyenmai
                WHERE maKM='$maKM'";
        $data = $this->connect()->query($sql)->fetchColumn();
        return $data;
    }

    public function CheckDiscountDate($ma_sp)
    {
        $currentDate = date("Y-m-d");
        $sql = "SELECT *
                FROM khuyenmaiSP
                WHERE start_date <= '$currentDate' AND end_date >= '$currentDate' AND ma_sp = '$ma_sp'";
        $result = $this->connect()->query($sql);
        $count = $result->fetchColumn();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function GetDiscountDate($ma_sp)
    {
        $currentDate = date("Y-m-d");
        $sql = "SELECT discount
                FROM khuyenmaiSP
                WHERE start_date <= '$currentDate' AND end_date >= '$currentDate' AND ma_sp = '$ma_sp'";
        $data = $this->connect()->query($sql)->fetchColumn();
        return $data;
    }

    public function GetProductTypeID($ma_loaisp)
    {
        $sql = "SELECT * FROM adproducttype WHERE ma_loaisp = '$ma_loaisp'";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data)) {
            echo ("");
        } else {
            return $data;
        }
    }

    public function GetProductID($ma_sp)
    {
        $sql = "SELECT * FROM product WHERE ma_sp = '$ma_sp'";
        $stm = $this->connect()->query($sql);
        while ($row = $stm->fetch()) {
            $data[] = $row;
        }
        if (empty($data)) {
            echo ("");
        } else {
            return $data;
        }
    }



    public function DeleteProduct($ma_sp)
    {
        $sql = "DELETE FROM product WHERE ma_sp = '$ma_sp'";
        $this->connect()->exec($sql);
        echo "Xóa thành công";
    }

    public function AddProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date)
    {
        $sql = "INSERT INTO product(ma_loaisp, ma_sp, tensp, hinhanh, dongia, soluong, khuyenmai, create_date)
                VALUE ('$ma_loaisp', '$ma_sp', '$tensp', '$hinhanh', '$dongia', '$soluong', '$khuyenmai', '$create_date')";
        $this->connect()->exec($sql);
        echo "Thêm thành công";
    }

    public function ChangeProduct($ma_loaisp, $ma_sp, $tensp, $hinhanh, $dongia, $soluong, $khuyenmai, $create_date)
    {
        $sql = "UPDATE product
                SET ma_loaisp = '$ma_loaisp', tensp = '$tensp', hinhanh = '$hinhanh', dongia = '$dongia', soluong = '$soluong', khuyenmai = '$khuyenmai', create_date = '$create_date'
                WHERE ma_sp = '$ma_sp'";
        $this->connect()->exec($sql);
        echo "Sửa thành công";
    }



    public function AddCustomer($maKH, $tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang)
    {
        $sql = "INSERT INTO customer(maKH, tenkh, dienthoai, email, diachi_lienhe, diachi_giaohang)
                VALUE ('$maKH', '$tenkh', '$dienthoai', '$email', '$diachi_lienhe', '$diachi_giaohang')";
        $this->connect()->exec($sql);
        echo "Thêm thành công";
    }

    public function AddOrderDetail($maHD, $ma_sp, $tensp, $soluong, $dongia, $khuyenmai)
    {
        $sql = "INSERT INTO orderdetail(maHD, ma_sp, tensp, soluong, dongia, khuyenmai)
                VALUE ('$maHD', '$ma_sp', '$tensp', '$soluong', '$dongia', '$khuyenmai')";
        $this->connect()->exec($sql);
        echo "Thêm thành công";
    }

    public function AddOrder($maHD, $create_date, $tongtien, $maKH)
    {
        $sql = "INSERT INTO orderlist(maHD, create_date, tongtien, maKH)
                VALUE ('$maHD', '$create_date', '$tongtien', '$maKH')";
        $this->connect()->exec($sql);
        echo "Thêm thành công";
    }
}
