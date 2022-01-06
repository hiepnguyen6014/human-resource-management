<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (isset($_GET['username'])) {
            $username = $_GET['username'];
    
            require_once '../../conn.php';
            $conn = get_connection();
            $sql = "SELECT `username`, `fname`, `lname`, `birthdate`, `date_begin`, `gmail`, `phone_number`, `salary`, `position`, `address`, `avatar`, `office_code` FROM `profiles` where username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();
    
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
    
            $staff = [
                "first_name" => $row['fname'],
                "last_name" => $row['lname'],
                "email" => $row['gmail'],
                "username" => $username,
                "position" => $row['position'],
                "office" => $row['office_code'],
                "salary" => $row['salary'],
                "phone" => $row['phone_number'],
                "address" => $row['address'],
                "birthday" => $row['birthdate'],
                "join" => $row['date_begin'],
                "image" => $row['avatar'],
            ];
    
            die(json_encode(array("status" => "success", "data" => $staff)));
        }
    
        echo json_encode(array("status" => "error", "message" => "Yêu cầu không hợp lệ"));
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>