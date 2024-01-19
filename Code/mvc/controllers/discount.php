<?php
class discount extends controller
{

    public function show()
    {
        $obj = $this->model("discount_model");
        $data = $obj->ShowDiscount();
        $this->view("discount_manager_view", $data);
    }


    public function AddManager($ticket_id, $discount, $start_date, $end_date)
    {
        $obj = $this->model("discount_model");
        $obj->AddDiscount($ticket_id, $discount, $start_date, $end_date);
        header('Location: http://localhost/ticketweb/discount');
    }

    public function DeleteManager($discount_id)
    {
        $obj = $this->model("discount_model");
        $obj->DeleteDiscount($discount_id);
        header('Location: http://localhost/ticketweb/discount');
    }

    public function GoToChange($discount_id)
    {
        $obj = $this->model("discount_model");
        $data = $obj->GetDiscountID($discount_id);
        $this->view("discount_change_view", $data);
    }

    public function ChangeManager($discount_id, $ticket_id, $discount, $start_date, $end_date)
    {
        $obj = $this->model("discount_model");
        $obj->ChangeDiscount($discount_id, $ticket_id, $discount, $start_date, $end_date);
        header('Location: http://localhost/ticketweb/discount');
    }

    public function GoToAdd()
    {
        $obj = $this->model("ticket_model");
        $data = $obj->ShowTicket();
        $this->view("discount_add_view", $data);
    }
}
