<?php

    if (!isset($_GET['office']) && !isset($_GET['search'])) {
        die(json_encode(array('status' => 'failed', 'data' => 'Office is required.')));
    }else {
        if (!isset($_GET['search'])) {
            $staffs = array();

            $offices = [
                "Marketing",
                "Finance",
                "Human Resources",
                "Sales",
                "IT",
                "Support",
            ];
        
        
        
            $office = $offices[$_GET['office'] - 1];
            $staffs[] = array(
                "id" => random_int(10000, 10000000),
                "name" => "Captain " . $office,
                "username" => "captain" . $office,
                "office" => $office,
                "position" => 1
            );
            for ($i = 0; $i < 75; $i++){
                $staffs[] = array(
                    "id" => $i,
                    "name" => "Staff $i",
                    "username" => "staff$i",
                    "office" => $office,
                    "position" => 0
                );
            }
        
            die(json_encode(array("status" => "success", "data" => $staffs)));
        }
        else {
            $staffs = array();

            $offices = [
                "Marketing",
                "Finance",
                "Human Resources",
                "Sales",
                "IT",
                "Support",
            ];
            $search = $_GET['search'];
            $office = $_GET['office'];
            for ($i = 0; $i < 45; $i++){
                $staffs[] = array(
                    "id" => $i,
                    "name" => "Staff $search $i",
                    "username" => "staff$i",
                    "office" => $offices[$office - 1],
                    "position" => 0
                );
            }
        
            die(json_encode(array("status" => "success", "data" => $staffs)));
        }
    }

    
?>