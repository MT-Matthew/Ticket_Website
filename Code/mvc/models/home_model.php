<?php

class home_model extends Database
{

    public function findTicket($keySearch)
    {
        $keySearch = '%' . $keySearch . '%'; // Thêm dấu % để tìm kiếm chứa từ khóa

        $sql = "SELECT * FROM ticket WHERE (ticket_code LIKE '$keySearch') OR (location_id LIKE '$keySearch') OR (type LIKE '$keySearch')";
        $stm = $this->connect()->query($sql);

        $data = array();

        while ($row = $stm->fetch()) {
            $data[] = $row;
        }

        return $data;
    }

    public function findTicketLocation($keySearch)
    {

        $sql = "SELECT * FROM ticket WHERE location_id = '$keySearch'";
        $stm = $this->connect()->query($sql);

        $data = array();

        while ($row = $stm->fetch()) {
            $data[] = $row;
        }

        return $data;
    }

    public function findTicketToday($keySearch)
    {

        $sql = "SELECT * FROM ticket WHERE start_date = '$keySearch'";
        $stm = $this->connect()->query($sql);

        $data = array();

        while ($row = $stm->fetch()) {
            $data[] = $row;
        }

        return $data;
    }

    public function findTicketWeekend()
    {

        // Truy vấn SQL để lấy vé có start_date là cuối tuần (thứ 7 và Chủ nhật)
        $sql = "SELECT * FROM ticket WHERE DAYOFWEEK(start_date) IN (1, 7)";

        $stm = $this->connect()->query($sql);

        $data = array();

        while ($row = $stm->fetch()) {
            $data[] = $row;
        }

        return $data;
    }
}
