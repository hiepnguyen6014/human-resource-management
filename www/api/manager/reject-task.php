<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
        function saveTaskFile($files, $taskId) {
            //create a folder for the task
            
            $length_files = count($files['name']);
    
            //sum size of all files
            $size = 0;
            for ($i = 0; $i < $length_files; $i++) { 
                $size += $files['size'][$i];
            }
            //check if the size is less than the 100MB
            if ($size > 100000000) {
                die(json_encode(array("status" => "error", "message" => "Mỗi gói tập tin tối đa 100MB")));
            }
            
            $count = 0;
            for ($i = 0; $i < $length_files; $i++) {
                
                // Check file size less than 100MB
                if ($files["size"][$i] > 100000000) {
                    die(json_encode(array("status" => "error", "message" => "Chứa tệp tin lớn hơn 100MB")));
                }
                $imageFileType = strtolower(pathinfo($files["name"][$i],PATHINFO_EXTENSION));
                // Allow certain file formats not exe and dat
                if($imageFileType == "exe" || $imageFileType == "dat") {
                    die(json_encode(array("status" => "error", "message" => "Chứa tệp tin không được hỗ trợ")));
                }
    
                //write file to server
                $count ++;
                
            }
            if ($count == $length_files) {
                //create a folder for the task
                $taskFolder = "../../tasks/";
                if (!file_exists($taskFolder)) {
                    mkdir($taskFolder, 0777, true);
                }
                $target_dir = "../../tasks/";
                $folderName = $taskId;
                $target_dir = $target_dir . $folderName . "/";
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $result = '';
                for ($i = 0; $i < $length_files; $i++) {
                    //delete 5 first characters of the file name
                    $fileName = substr($files["tmp_name"][$i], 5);
                    $target_file = $target_dir . $fileName;
                    $imageFileType = strtolower(pathinfo($files["name"][$i],PATHINFO_EXTENSION));
                    // Check if file already exists and delete it
                    $target_file .= "." . $imageFileType;
                    if (file_exists($target_file)) {
                        unlink($target_file);
                    }
                    move_uploaded_file($files["tmp_name"][$i], $target_file);
                    $result .= $fileName . "." . $imageFileType . ",";
                }
                return substr($result, 0, -1);
            } else {
                return '';
            }
        }

        $files = $_FILES['files'];


        require_once '../../conn.php';
        $conn = get_connection();

        $task_id = $_POST['id'];
        $message = $_POST['message'];

        $deadline = $_POST['time'];
        $deadline = date("Y-m-d H:i:s", strtotime($deadline));


        $files_name = saveTaskFile($files, $task_id);

                $sql = "INSERT INTO `task_feedback`(`task_id`, `message`, `file`) VALUES";
                $sql .= "(?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('iss', $task_id, $message, $files_name);
                $stmt->execute();

                $sql = "UPDATE `task` SET `status`= 1 WHERE `task_id`=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $task_id);
                $stmt->execute();

                // check affected rows
                if ($stmt->affected_rows > 0) {
                    $data = array(
                        "message" => "Gửi thành công",
                        "task" => array(
                            "task_id" => $task_id,
                            "message" => $message,
                            "file" => $files_name,
                            "time" => date("Y-m-d H:i:s")
                        )
                    );

                    if ($deadline != "") {
                        $sql = "UPDATE `task` SET `deadline`=? WHERE `task_id`=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('si', $deadline, $task_id);
                        $stmt->execute();
                        $data['task']['deadline'] = $deadline;
                    }

                    die(json_encode(array("status" => "success", "data" => $data)));
                } else {
                    die(json_encode(array("status" => "error", "message" => "Gửi thất bại")));
                }
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>