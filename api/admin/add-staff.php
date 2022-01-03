<?php
    session_start();
    require_once '../../conn.php';
    $conn = get_connection();

    $username = $_POST['username'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $office = $_POST['office'];

    $sql = "insert into `Accounts` (`username`, `password`) values (?, ?)";
    $stmt = $conn->prepare($sql);
    $password = password_hash($username, PASSWORD_BCRYPT);
    $username = strtolower($username);
    $stmt->bind_param('ss', $username, $password );
    $stmt->execute();

    if($stmt->affected_rows > 0){
        $sql = "insert into `Profiles` (`username`,`fname`, `lname`, `office_code`) values (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $username, $fname, $lname, $office);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            die(json_encode(array("status" => "success", "message" => "Thêm nhân viên thành công.")));
        }
        else{
            die(json_encode(array("status" => "error", "message" => "Thêm nhân viên thất bại.")));
        }
    }
    else{
        die(json_encode(array("status" => "error", "message" => "Không thể thêm nhân viên.")));
    }
?>