<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
        if (count($_POST) == 4) {
            $username = $_POST['staff'];
            $title = $_POST['title'];
            $deadline = $_POST['deadline'];
            $message = $_POST['description'];

            $sender = $_SESSION['username'];

            require_once '../../conn.php';
            $conn = get_connection();
            $sql = "INSERT INTO `task` (`title`, `deadline`, `username`) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sss', $title, $deadline, $username);
            $stmt->execute();

            $task_id = $stmt->insert_id;

            $sql = "INSERT INTO `task_feedback`(`task_id`, `message`, `file`, `sender_user`, `receiver_user`) VALUES";
            $sql .= "(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $file = 'default.webp';
            $stmt->bind_param('issss', $task_id, $message, $file, $sender, $username);
            $stmt->execute();
            
            echo json_encode(array("status" => "success", "message" => 'Thêm công việc thành công'));
        }
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>