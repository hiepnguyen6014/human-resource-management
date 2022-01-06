<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        require '../conn.php';
        $conn = get_connection();

        $sql = "SELECT `username`, `fname` as first_name, `lname` as last_name, `birthdate` as birthday, `date_begin` as `join`, `gmail` as email, `phone_number` as phone, `salary`, `position`, `address`, `avatar` as image, `office_code` as office FROM `profiles` WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $staff = $result->fetch_assoc();
            die(json_encode(array("status" => "success", "data" => $staff)));
        } else {
            die(json_encode(array("status" => "error", "message" => "Không tìm thấy nhân viên")));
        }
    

    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
    

?>