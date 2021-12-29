<?php
    if (!isset($_GET['id'])) {
        die(json_encode(array("status" => "error", "data" => "data request")));
    }

    $id = $_GET['id'];
    $office = [
        "id" => $id,
        "name" => "$id",
        "room" => "$id Room",
        "captain" => "Nguyen $id",
        "phone" => "0987654321",
        "description" => "This is a description of the $id office",
        "created_at" => "2020-01-01 00:00:00"
    ];

    echo json_encode(array("status" => "success", "data" => $office));
?>