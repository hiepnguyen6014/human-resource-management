<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');
    header('Content-Type: application/json; charset=utf-8');
    require_once '../../conn.php';
    $conn = get_connection();
    
    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
        if (!isset($_GET['search'])) {
            die(json_encode(array("status" => "error", "message" => "data request")));
        }
        $search = $_GET['search'];
        
        $username = $_SESSION['username'];
        $sql = "select `office_code` from `profiles` where `username` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $office = $row['office_code'];

        $search_tmp = '%' . $search . '%';
        $sql = "select `user_id`, `username`, `fname`, `lname`, `gmail`, `phone_number` from `Profiles` where `office_code` = ? and (`fname` like ? or `lname` like ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $office, $search_tmp, $search_tmp);
        $stmt->execute();

        $result = $stmt->get_result();

        $staffs = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $staffs[] = array(
                    "id" => $row['user_id'],
                    "name" => $row['fname'] . ' ' . $row['lname'],
                    "username" => $row['username'],
                    "phone" => $row['phone_number'],
                    "email" => $row['gmail']
                );
            }
            die(json_encode(array("status" => "success", "data" => $staffs)));
        }
        die(json_encode(array("status" => "error", "message" => "Không tìm thấy nhân viên")));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>