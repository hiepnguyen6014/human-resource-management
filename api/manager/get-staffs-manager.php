<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
        require_once '../../conn.php';
        $conn = get_connection();

        $username = $_SESSION['username'];
        $sql = "select `office_code` from `profiles` where `username` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $office_code = $row['office_code'];
        
        $sql = "SELECT `user_id`, `username`, `fname`, `lname`, `gmail`, `phone_number` FROM `profiles` WHERE office_code = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $office_code);
        $stmt->execute();
        
        $staffs = array();

        $result = $stmt->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $staffs[] = array(
                    "id" => $row['user_id'],
                    "name" => $row['fname'] . ' ' . $row['lname'],
                    "username" => $row['username'],
                    "phone" => $row['phone_number'],
                    "email" => $row['gmail']
                );
            }
        }
        die(json_encode(array('status' => 'success', 'data' => $staffs)));
    }
    else {
        die(json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này')));
    }
?>