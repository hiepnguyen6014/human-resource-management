<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        /* require '../conn.php';
        $conn = get_connection(); */
        $file = $_FILES['avatar'];
        
        $target_dir = "../images/avatars/";
        $imageFileType = strtolower(pathinfo(basename($file["name"]),PATHINFO_EXTENSION));
        $target_file = $target_dir . $username . "." . $imageFileType;
        if($file['error'] != 0){
            die(json_encode(array('status' => 'error', 'message' => 'Cập nhật ảnh đại diện thất bại.')));
        }
        // Check if image file is a actual image or fake image
        $check = getimagesize($file["tmp_name"]);
        if(!$check) {
            die(json_encode(array("status" => "error", "message" => "Tệp tin không phải là hình ảnh")));
        }   

        // Check file size less than 5MB
        if ($file["size"] > 500000) {
            die(json_encode(array("status" => "error", "message" => "Tệp tin lớn hơn 5MB")));
        }

        // Check if file already exists and delete it
        if (file_exists($target_file)) {
            unlink($target_file);
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" ) {
            die(json_encode(array("status" => "error", "message" => "Tệp tin không được hỡ trợ")));
        }

        //write file to server
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            //update database
            require '../conn.php';
            $conn = get_connection();
            $sql = "UPDATE profiles SET avatar = '$username.$imageFileType' WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                die(json_encode(array("status" => "success", "message" => "Đổi ảnh đại diện thành công")));
            } else {
                die(json_encode(array("status" => "error", "message" => "Đổi diện thất bại")));
            }
        } else {
            die(json_encode(array("status" => "error", "message" => "Tệp tin không thể tải lên")));
        }

    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
    

?>