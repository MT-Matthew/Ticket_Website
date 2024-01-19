<?php
class ticket extends controller
{

    public function show()
    {
        $obj = $this->model("ticket_model");
        $data = $obj->ShowTicket();
        $this->view("ticket_manager_view", $data);
    }

    public function getTicketID()
    {
        $obj = $this->model("ticket_model");
        $data = $obj->ShowTicketID();
        $this->view("Change", $data);
    }

    /* -------------------------------------------------------------------------------------------------------------------------------------------------- */

    public function AddManager($ticket_code, $location_id, $start_date, $price, $quantity, $type, $image)
    {
        $obj = $this->model("ticket_model");
        $obj->AddTicket($ticket_code, $location_id, $start_date, $price, $quantity, $type, $image);
        header('Location: http://localhost/ticketweb/ticket');
    }

    public function DeleteManager($ticket_id)
    {
        $obj = $this->model("ticket_model");
        $obj->DeleteTicket($ticket_id);
        header('Location: http://localhost/ticketweb/ticket');
    }


    public function ChangeManager($ticket_id, $ticket_code, $location_id, $start_date, $price, $status, $quantity, $type, $image)
    {
        $obj = $this->model("ticket_model");
        $obj->ChangeTicket($ticket_id, $ticket_code, $location_id, $start_date, $price, $status, $quantity, $type, $image);
        header('Location: http://localhost/ticketweb/ticket');
    }

    public function ChangeNoImage($ticket_id, $ticket_code, $location_id, $start_date, $price, $status, $quantity, $type)
    {
        $obj = $this->model("ticket_model");
        $obj->ChangeTicketNoImage($ticket_id, $ticket_code, $location_id, $start_date, $price, $status, $quantity, $type);
        header('Location: http://localhost/ticketweb/ticket');
    }

    public function GoToChange($ticket_id)
    {
        $obj = $this->model("ticket_model");
        $obj2 = $this->model("location_model");
        $data1 = $obj->GetTicketID($ticket_id);
        $data2 = $obj2->ShowLocation();
        $data = array('data1' => $data1, 'data2' => $data2);
        $this->view("ticket_change_view", $data);
    }

    public function GoToAdd()
    {
        $obj = $this->model("ticket_model");
        $obj2 = $this->model("location_model");
        $data1 = $obj->ShowTicket();
        $data2 = $obj2->ShowLocation();
        $data = array('data1' => $data1, 'data2' => $data2);
        $this->view("ticket_add_view", $data);
    }
}
