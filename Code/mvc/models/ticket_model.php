<?php

class ticket_model extends Database
{

    public function ShowTicket()
    {
        $sql = "SELECT * FROM ticket";
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

    public function GetTicketID($ticket_id)
    {
        $sql = "SELECT * FROM ticket WHERE ticket_id = '$ticket_id'";
        $stm = $this->connect()->query($sql);

        return $stm;

        // while ($row = $stm->fetch()) {
        //     $data[] = $row;
        // }
        // if (empty($data)) {
        //     echo ("");
        // } else {
        //     return $data;
        // }
    }

    public function DeleteTicket($ticket_id)
    {
        $sql = "DELETE FROM ticket WHERE ticket_id = '$ticket_id'";
        $this->connect()->exec($sql);
        echo "Xóa thành công";
    }

    public function AddTicket($ticket_code, $location_id, $start_date, $price, $quantity, $type, $image)
    {
        $sql = "INSERT INTO ticket(ticket_code, location_id, start_date, price, quantity, type, image)
                VALUE ('$ticket_code', '$location_id', '$start_date', '$price', '$quantity', '$type', '$image')";
        $this->connect()->exec($sql);
        echo "Thêm thành công";
    }

    public function ChangeTicket($ticket_id, $ticket_code, $location_id, $start_date, $price, $status, $quantity, $type, $image)
    {
        $sql = "UPDATE ticket
                SET ticket_code = '$ticket_code', location_id = '$location_id', start_date = '$start_date', price = '$price', status = '$status', quantity = '$quantity', type = '$type', image = '$image'
                WHERE ticket_id = '$ticket_id'";
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
