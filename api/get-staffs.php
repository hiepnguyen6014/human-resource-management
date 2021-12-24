<?php
    $staffs = array();

    for ($i = 0; $i < 100; $i++){
        $staffs[$i] = array(
            "id" => $i,
            "name" => "Staff $i",
            "username" => "staff$i",
            "office" => "Office $i",
            "type" => 1
        );

    }

    echo json_encode(array("status" => "success", "data" => $staffs));
?>