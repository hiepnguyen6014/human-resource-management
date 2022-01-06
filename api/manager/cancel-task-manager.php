<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');



    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
        $task_id = $_POST['task_id'];
        
        require_once '../../conn.php';
        $conn = get_connection();

        $sql = "UPDATE task SET status = 7 WHERE task_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $task_id);
        $stmt->execute();

        $sql = "Delete from task_feedback where task_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $task_id);
        $stmt->execute();
        
        //check affected rows
        if ($stmt->affected_rows > 0) {
            //delete folder of task
            $target_dir = "../../tasks/" . $task_id . "/";
            if (file_exists($target_dir)) {
                $files = glob($target_dir . '*'); // get all file names
                foreach($files as $file){ // iterate files
                    if(is_file($file))
                        unlink($file); // delete file
                }
                rmdir($target_dir);
            }
            $response = array(
                'status' => 'success',
                'message' => 'Huỷ nhiệm vụ thành công'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Huỷ nhiệm vụ thất bại'
            );
        }

        die(json_encode($response));
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>