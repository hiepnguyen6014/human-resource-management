<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (!isset($_GET['office']) && !isset($_GET['search'])) {
            die(json_encode(array('status' => 'failed', 'data' => 'Office is required.')));
        }else {
            require_once '../../conn.php';
            $conn = get_connection();
            
            if (!isset($_GET['search'])) {
                $office = $_GET['office'];
                $sql = "select `user_id` as id, `fname`, `lname`, `position`, `username` from `Profiles` where `office_code` = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $office);
                $stmt->execute();
    
                $result = $stmt->get_result();
    
                $staffs = array();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $staffs[] = array(
                            "id" => $row['id'],
                            "name" => $row['fname'] . ' ' . $row['lname'],
                            "username" => $row['username'],
                            "office" => $office,
                            "position" => $row['position']
                        );
                    }
    
                }
            
                die(json_encode(array("status" => "success", "data" => $staffs)));
            }
            else {
                $search = $_GET['search'];
                $office = $_GET['office'];
    
                $search_tmp = '%' . $search . '%';
                $sql = "select `user_id` as id, `fname`, `lname`, `position`, `username` from `Profiles` where `office_code` = ? and (`fname` like ? or `lname` like ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sss', $office, $search_tmp, $search_tmp);
                $stmt->execute();
    
                $result = $stmt->get_result();
    
                $staffs = array();
    
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $staffs[] = array(
                            "id" => $row['id'],
                            "name" => $row['fname'] . ' ' . $row['lname'],
                            "username" => $row['username'],
                            "office" => $office,
                            "position" => $row['position']
                        );
                    }
                    die(json_encode(array("status" => "success", "data" => $staffs)));
                }
                die(json_encode(array("status" => "error", "message" => "Không tìm thấy nhân viên")));
            }
        }
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>