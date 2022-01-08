<?php
    session_start();
    
    if (!isset($_POST['id'])) {
        die(json_encode(array(
            'status' => 'error',
            'data' => 'No id specified'
        )));
    }

    if (isset($_SESSION['type'])) {
        require_once '../conn.php';
        $conn = get_connection();

        $vacation_id = $_POST['id'];
        $reason_disagree = $_POST['reason'];

        $sql = "UPDATE `vacation` SET `status` = '3', `feedback` = ? WHERE vacation_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si',$reason_disagree,$vacation_id);
        $stmt->execute();

    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'You are not authorized to access this page'));
    }
?>