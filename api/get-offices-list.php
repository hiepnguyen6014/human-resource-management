<?php
    $offices = [
        array(
            "id" => 1,
            "name" => "Marketing",
            "room" => "Marketing Room",
            "captain" => "Nguyen Marketing",
            "phone" => "0987654321"
        ),
        array(
            "id" => 2,
            "name" => "Finance",
            "room" => "Finance Room",
            "captain" => "Nguyen Finance",
            "phone" => "0987654321"
        ),
        array(
            "id" => 3,
            "name" => "Human Resources",
            "room" => "HR Room",
            "captain" => "Nguyen HR",
            "phone" => "0987654321"
        ),
        array(
            "id" => 4,
            "name" => "Sales",
            "room" => "Sales Room",
            "captain" => "Nguyen Sales",
            "phone" => "0987654321"
        ),
        array(
            "id" => 5,
            "name" => "IT",
            "room" => "IT Room",
            "captain" => "Nguyen IT",
            "phone" => "0987654321"
        ),
        array(
            "id" => 6,
            "name" => "Support",
            "room" => "Support Room",
            "captain" => "Nguyen Support",
            "phone" => "0987654321"
        )
    ];
    echo json_encode(array('status' => 'success', 'data' => $offices));
?>