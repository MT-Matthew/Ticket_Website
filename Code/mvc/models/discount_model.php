<?php

class discount_model extends Database
{

    public function ShowDiscount()
    {
        $sql = "SELECT * FROM discount";
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

    public function GetDiscountID($discount_id)
    {
        $sql = "SELECT * FROM discount WHERE discount_id = '$discount_id'";
        $stm = $this->connect()->query($sql);

        return $stm;
    }

    public function DeleteDiscount($discount_id)
    {
        $sql = "DELETE FROM discount WHERE discount_id = '$discount_id'";
        $this->connect()->exec($sql);
        echo "Xóa thành công";
    }

    public function AddDiscount($ticket_id, $discount, $start_date, $end_date)
    {
        $sql = "INSERT INTO discount(ticket_id, discount, start_date, end_date)
                VALUE ('$ticket_id', '$discount', '$start_date', '$end_date')";
        $this->connect()->exec($sql);
        echo "Thêm thành công";
    }

    public function ChangeDiscount($discount_id, $ticket_id, $discount, $start_date, $end_date)
    {
        $sql = "UPDATE discount
                SET ticket_id = '$ticket_id', discount = '$discount', start_date = '$start_date', end_date = '$end_date'
                WHERE discount_id = '$discount_id'";
        $this->connect()->exec($sql);
        echo "Sửa thành công";
    }

    public function ChangeTicketNoImage($ticket_id, $ticket_code, $location_id, $start_date, $price, $status, $quantity, $type)
    {
        $sql = "UPDATE ticket
                SET ticket_code = '$ticket_code', location_id = '$location_id', start_date = '$start_date', price = '$price', status = '$status', quantity = '$quantity', type = '$type'
                WHERE ticket_id = '$ticket_id'";
        $this->connect()->exec($sql);
        echo "Sửa thành công";
    }
}
