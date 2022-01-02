<?php
    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        $staff = [
            "first_name" => "Nguyen" . $username,
            "last_name" => "Hiep" . $username,
            "email" => "dai" . $username . "@gmail.com",
            "username" => $username,
            "position" => 0,
            "office" => "Marketing",
            "salary" => "120000",
            "phone" => "2346236487",
            "address" => "19 Nguyen Huu Tho, Phu Nhuan, Da Nang",
            "birthday" => "1996-12-12",
            "join" => "2019-12-12",
            "image" => "default.webp",
        ];

        die(json_encode(array("status" => "success", "data" => $staff)));
    }

    echo json_encode(array("status" => "error", "data" => "data request"));
?>