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
        if (count($_POST) == 4) {

            $files = $_FILES['files'];

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

            $files_name = saveTaskFile($files, $task_id);

            if ($files_name != '') {
                $sql = "INSERT INTO `task_feedback`(`task_id`, `message`, `file`, `sender_user`, `receiver_user`) VALUES";
                $sql .= "(?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('issss', $task_id, $message, $files_name, $sender, $username);
                $stmt->execute();

                echo json_encode(array("status" => "success", "message" => 'Thêm công việc thành công'));
            } else {
                // delete task
                $sql = "DELETE FROM `task` WHERE `task`.`id` = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $task_id);
                $stmt->execute();

                echo json_encode(array("status" => "error", "message" => 'Thêm công việc thất bại'));
            }

            
        }
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>