<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {

        require_once '../../conn.php';
        $conn = get_connection();

        $username = $_SESSION['username'];
        $start_date = $_POST['date'];
        $number_day_off = $_POST['number'];
        $reason = $_POST['reason'];

        if ($_FILES['file']['error'] == 0) 
        {
            $file = $_FILES['file'];
            
            // check file type
            $file_type = explode('.', $file['name']);
            $file_type = strtolower(end($file_type));
            $allow_file = array('jpg', 'jpeg', 'docx', 'doc', 'pdf', 'png');
            if (!in_array($file_type, $allow_file)) {
                $result = array(
                    'status' => 'error',
                    'message' => 'Tệp tin không hợp lệ'
                );
                die(json_encode($result));
            }
            // check file size < 20MB
            if ($file['size'] > 20971520) {
                $result = array(
                    'status' => 'error',
                    'message' => 'Tệp tin không được vượt quá 20MB'
                );
                die(json_encode($result));
            }

            // upload file
            $file_name = uniqid('', true) . '.' . $file_type;
            // create folder if not exist
            if (!file_exists('../../vacations/')) {
                mkdir('../../vacations/', 0777, true);
            }
            $file_path = '../../vacations/' . $file_name;
            move_uploaded_file($file['tmp_name'], $file_path);
            
            $sql = "INSERT INTO `vacation`(`username`, `start_date_real`, `number_day_off`, `reason`, `file`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssss', $username, $start_date, $number_day_off, $reason, $file_name);
            $stmt->execute();

        } else {
            $sql = "INSERT INTO `vacation` (`username`, `start_date_real`, `number_day_off`, `reason`) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssss', $username, $start_date, $number_day_off, $reason);
            $stmt->execute();
        }

            if ($stmt->affected_rows > 0) {
                $result = array(
                    'status' => 'success',
                    'message' => 'Gửi yêu cầu thành công'
                );
            } else {
                $result = array(
                    'status' => 'error',
                    'message' => 'Gửi yêu cầu thất bại'
                );
            }

        die(json_encode($result));
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>