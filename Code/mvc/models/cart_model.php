<?php

class cart_model extends Database
{
    public function GetTicketDetail($ticket_id)
    {
        $sql = "SELECT * FROM ticket WHERE ticket_id = '$ticket_id'";
        $stms = $this->connect()->query($sql);
        $stm = $stms->fetch();
        return $stm;
    }

    public function GetLocationDetail($location_id)
    {
        $sql = "SELECT * FROM location WHERE location_id = '$location_id'";
        $stms = $this->connect()->query($sql);
        $stm = $stms->fetch();
        return $stm;
    }

    public function CheckDiscountDate($ma_sp)
    {
        $currentDate = date("Y-m-d");
        $sql = "SELECT *
                FROM discount
                WHERE start_date <= '$currentDate' AND end_date >= '$currentDate' AND ticket_id = '$ma_sp'";
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
                FROM discount
                WHERE start_date <= '$currentDate' AND end_date >= '$currentDate' AND ticket_id = '$ma_sp'";
        $data = $this->connect()->query($sql)->fetchColumn();
        return $data;
    }
}
