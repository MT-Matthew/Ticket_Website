<?php
class location extends controller
{

    public function show()
    {
        $obj = $this->model("location_model");
        $data = $obj->ShowLocation();
        $this->view("location_manager_view", $data);
    }

    public function getLocationID()
    {
        $obj = $this->model("productModel");
        $data = $obj->ShowLocationID();
        $this->view("Change", $data);
    }

    /* -------------------------------------------------------------------------------------------------------------------------------------------------- */

    public function AddManager($location_name, $country, $city, $image)
    {
        $obj = $this->model("location_model");
        $obj->AddLocation($location_name, $country, $city, $image);
        header('Location: http://localhost/ticketweb/location');
    }

    public function DeleteManager($location_id)
    {
        $obj = $this->model("location_model");
        $obj->DeleteLocation($location_id);
        header('Location: http://localhost/ticketweb/location');
    }


    public function ChangeManager($location_id, $location_name, $country, $city, $image)
    {
        $obj = $this->model("location_model");
        $obj->ChangeLocation($location_id, $location_name, $country, $city, $image);
        header('Location: http://localhost/ticketweb/location');
    }

    public function ChangeNoImage($location_id, $location_name, $country, $city)
    {
        $obj = $this->model("location_model");
        $obj->ChangeLocationNoImage($location_id, $location_name, $country, $city);
        header('Location: http://localhost/ticketweb/location');
    }

    public function GoToChange($location_id)
    {
        $obj = $this->model("location_model");
        $data = $obj->GetLocationID($location_id);
        $this->view("location_change_view", $data);
    }

    public function GoToAdd()
    {
        $this->view("location_add_view");
    }
}
