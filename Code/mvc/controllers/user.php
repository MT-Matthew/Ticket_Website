<?php
class user extends controller
{

    public function show()
    {
        $obj = $this->model("user_model");
        $data = $obj->ShowUser();
        $this->view("user_manager_view", $data);
    }
    public function getTicketID()
    {
        $obj = $this->model("user_model");
        $data = $obj->ShowTicketID();
        $this->view("Change", $data);
    }

    /* -------------------------------------------------------------------------------------------------------------------------------------------------- */

    public function AddManager($user_name, $email, $password)
    {
        $obj = $this->model("user_model");
        $obj->AddUser($user_name, $email, $password);
    }

    public function DeleteManager($user_id)
    {
        $obj = $this->model("user_model");
        $obj->DeleteUser($user_id);
        header('Location: http://localhost/ticketweb/user');
    }


    public function ChangeManager($user_id, $user_name, $email, $password)
    {
        $obj = $this->model("user_model");
        $obj->ChangeUser($user_id, $user_name, $email, $password);
        header('Location: http://localhost/ticketweb/user');
    }

    public function GoToChange($location_id)
    {
        $obj = $this->model("user_model");
        $data = $obj->GetUserID($location_id);
        $this->view("user_change_view", $data);
    }


    public function checkEmail($email)
    {
        $obj = $this->model("user_model");
        $count = $obj->CheckEmail($email);
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkAccount($email, $password)
    {
        $obj = $this->model("user_model");
        $count = $obj->CheckAccount($email, $password);
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDiscountType($maKM)
    {
        $obj = $this->model("user_model");
        return $obj->CheckDiscountType($maKM);
    }

    public function discount($maKM)
    {
        $obj = $this->model("user_model");
        return $obj->Discount($maKM);
    }

    public function GoToLogin()
    {
        $this->view("login_view");
    }
}
