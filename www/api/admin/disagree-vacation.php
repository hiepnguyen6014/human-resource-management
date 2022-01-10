<?php
    session_start();
    
    if (!isset($_POST['id'])) {
        die(json_encode(array(
            'status' => 'error',
            'data' => 'No id specified'
        )));
    }

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        require_once '../../conn.php';
        $conn = get_connection();

        $vacation_id = $_POST['id'];
        $reason_disagree = $_POST['reason'];

        $sql = "UPDATE `vacation` SET `status` = '3', `feedback` = ? WHERE vacation_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si',$reason_disagree,$vacation_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $result = array(
                'status' => 'success',
                'message' => 'Đã từ chối yêu cầu nghỉ phép'
            );
        } else {
            $result = array(
                'status' => 'error',
                'message' => 'Đã từ chối yêu cầu nghỉ phép'
            );
        }

        echo json_encode($result);

    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>