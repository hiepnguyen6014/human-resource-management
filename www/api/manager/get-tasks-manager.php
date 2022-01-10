<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
        require_once '../../conn.php';
        $conn = get_connection();

        //get code_office
        $username = $_SESSION['username'];
        $sql = "SELECT office_code FROM profiles WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $office_code = $row['office_code'];

        //select all users in this office
        $sql = "SELECT username FROM profiles WHERE office_code = '$office_code'";
        $result = $conn->query($sql);
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row['username'];
        }

        $sql = "SELECT `task_id` as `id`, `username`, `title` as `task_name`,`deadline`, `date_begin`, `status`";
        $sql .= " FROM `task` ORDER BY `date_begin` DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $tasks = array();
        while ($row = $result->fetch_assoc()) {
            if (in_array($row['username'], $users)) {
                $tasks[] = $row;
            }
        }
        echo json_encode(array("status" => "success", "data" => $tasks));
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>