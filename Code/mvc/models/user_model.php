<?php

class user_model extends Database
{

    public function ShowUser()
    {
        $sql = "SELECT * FROM users";
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

    public function GetUserID($user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
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

    public function DeleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE user_id = '$user_id'";
        $this->connect()->exec($sql);
        echo "Xóa thành công";
    }

    public function AddUser($user_name, $email, $password)
    {
        $sql = "INSERT INTO users(user_name, email, password)
                VALUE ('$user_name', '$email', '$password')";
        $this->connect()->exec($sql);
    }

    public function ChangeUser($user_id, $user_name, $email, $password)
    {
        $sql = "UPDATE users
                SET user_name = '$user_name', email = '$email', password = '$password'
                WHERE user_id = '$user_id'";
        $this->connect()->exec($sql);
        echo "Sửa thành công";
    }


    public function CheckEmail($email)
    {
        $sql = "SELECT *
                FROM users
                WHERE email='$email'";
        $result = $this->connect()->query($sql);
        $count = $result->fetchColumn();
        return $count;
    }

    public function CheckAccount($email, $password)
    {
        $sql = "SELECT *
                FROM users
                WHERE email='$email' AND password='$password'";
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
}
