<?php

class location_model extends Database
{

    public function ShowLocation()
    {
        $sql = "SELECT * FROM location";
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

    public function ShowCountry()
    {
        $sql = "SELECT country FROM location GROUP BY country;";
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

    public function GetLocationID($location_id)
    {
        $sql = "SELECT * FROM location WHERE location_id = '$location_id'";
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

    public function DeleteLocation($location_id)
    {
        $sql = "DELETE FROM location WHERE location_id = '$location_id'";
        $this->connect()->exec($sql);
        echo "Xóa thành công";
    }

    public function AddLocation($location_name, $country, $city, $image)
    {
        $sql = "INSERT INTO location(location_name, country, city, image)
                VALUE ('$location_name', '$country', '$city', '$image')";
        $this->connect()->exec($sql);
        echo "Thêm thành công";
    }

    public function ChangeLocation($location_id, $location_name, $country, $city, $image)
    {
        $sql = "UPDATE location
                SET location_name = '$location_name', country = '$country', city = '$city', image = '$image'
                WHERE location_id = '$location_id'";
        $this->connect()->exec($sql);
        echo "Sửa thành công";
    }
    public function ChangeLocationNoImage($location_id, $location_name, $country, $city)
    {
        $sql = "UPDATE location
                SET location_name = '$location_name', country = '$country', city = '$city'
                WHERE location_id = '$location_id'";
        $this->connect()->exec($sql);
        echo "Sửa thành công";
    }
}
