<?php

class order_model extends Database
{
    public function GetOrderDetail($order_id)
    {
        $sql = "SELECT *
                FROM order_detail
                WHERE order_id = '$order_id'";
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

    public function watchProfit($year, $month = null)
    {
        $sql = "SELECT * FROM orders
                WHERE YEAR(orders.create_date) = '$year'";

        if ($month !== null) {
            $sql .= " AND MONTH(orders.create_date) = '$month'";
        }

        // if ($quarter !== null) {
        //     // Chuyển quý thành tháng tương ứng
        //     $startMonth = ($quarter - 1) * 3 + 1;
        //     $endMonth = $quarter * 3;
        //     $sql .= " AND MONTH(oder.date_create) BETWEEN '$startMonth' AND '$endMonth'";
        // }

        $stm = $this->connect()->query($sql);
        $data = array();

        while ($row = $stm->fetch()) {
            $data[] = $row;
        }

        return $data;
    }

    public function GetOrderList()
    {
        $sql = "SELECT * FROM orders";
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

    public function GetOrderChartDay($start_date, $end_date)
    {
        $sql = "SELECT SUM(total) as total_amount_sum FROM orders WHERE create_date BETWEEN '$start_date' AND '$end_date'";
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

    public function ChangeStatus($order_id, $new_status)
    {
        $sql = "UPDATE orders
                SET status = '$new_status'
                WHERE order_id='$order_id'";
        $this->connect()->exec($sql);
    }

    public function AddOrderDetail($maHD, $ticket_id, $quantity, $price)
    {
        $sql = "INSERT INTO order_detail(order_id, ticket_id, quantity, price)
                VALUE ('$maHD', '$ticket_id', '$quantity', '$price')";
        $this->connect()->exec($sql);
        echo "Thêm thành công";
    }

    public function AddOrder($maHD, $create_date, $total, $maKH)
    {
        $sql = "INSERT INTO orders(order_id, create_date, total, user_id)
                VALUE ('$maHD', '$create_date', '$total', '$maKH')";
        $this->connect()->exec($sql);
        echo "Thêm thành công";
    }
}
