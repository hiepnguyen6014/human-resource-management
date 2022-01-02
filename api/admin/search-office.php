<?php
    if (!isset($_GET['search'])) {
        die(json_encode(array("status" => "error", "data" => "data request")));
    }

    $search = $_GET['search'];
    // lowercase search
    $search = strtolower($search);
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
    // check search in office
    $offices_search = [];
    foreach ($offices as $office) {
        if ((strpos(strtolower($office['name']), $search) !== false) || 
            (strpos(strtolower($office['room']), $search) !== false) ||
            (strpos(strtolower($office['captain']), $search) !== false) ||
            (strpos(strtolower($office['phone']), $search) !== false)) {
            array_push($offices_search, $office);
        }
    }

    echo json_encode(array("status" => "success", "data" => $offices_search));
?>