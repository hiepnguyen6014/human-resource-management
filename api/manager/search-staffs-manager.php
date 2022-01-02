<?php
    if (!isset($_GET['search'])) {
        die(json_encode(array("status" => "error", "data" => "data request")));
    }

    $search = $_GET['search'];
    // lowercase search
    $search = strtolower($search);
    $staff = [
        array(
            "id" => 1,
            "name" => "Marketing",
            "username" => "Nguyen Marketing",
            "email" => "asda@gmail.com",
            "phone" => "0987654321"
        ),
        array(
            "id" => 2,
            "name" => "Finance",
            "username" => "Nguyen Finance",
            "email" => "asdasd@gmail.com",
            "phone" => "0987654321")
    ];
    // check search in office
    $staff_search = [];
    foreach ($staff as $office) {
        if ((strpos(strtolower($office['name']), $search) !== false) || 
            (strpos(strtolower($office['username']), $search) !== false) ||
            (strpos(strtolower($office['email']), $search) !== false) ||
            (strpos(strtolower($office['phone']), $search) !== false)) {
            array_push($staff_search, $office);
        }
    }

    echo json_encode(array("status" => "success", "data" => $staff_search));
?>