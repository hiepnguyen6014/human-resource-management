<?php
    $offices = [
        array(
            "id" => 1,
            "name" => "Marketing",
        ),
        array(
            "id" => 2,
            "name" => "Finance",
        ),
        array(
            "id" => 3,
            "name" => "Human Resources",
        ),
        array(
            "id" => 4,
            "name" => "Sales",
        ),
        array(
            "id" => 5,
            "name" => "IT",
        ),
        array(
            "id" => 6,
            "name" => "Support",
        )
    ];
    echo json_encode(array('status' => 'success', 'data' => $offices));
?>