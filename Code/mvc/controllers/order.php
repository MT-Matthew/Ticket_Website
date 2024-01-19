<?php

class order extends controller
{
    public function getOrderStatus()
    {
        $obj = $this->model("order_model");
        $data = $obj->GetOrderList();
        $this->view("order_list_view", $data);
    }

    public function getOrderDetail($order_id)
    {
        $obj = $this->model("order_model");
        $data = $obj->GetOrderDetail($order_id);
        $this->view("order_detail_view", $data);
    }

    public function updateStatus($order_id, $new_status)
    {
        $obj = $this->model("order_model");
        $data = $obj->ChangeStatus($order_id, $new_status);
        $this->view("order_list_view", $data);
        header("refresh:0.001; url=http://localhost/ticketweb/order/getOrderStatus");
    }
}
