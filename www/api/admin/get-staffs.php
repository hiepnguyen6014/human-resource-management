<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');
    require_once '../../conn.php';
    $conn = get_connection();
    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (!isset($_GET['office']) && !isset($_GET['search'])) {
            die(json_encode(array('status' => 'failed', 'data' => 'Office is required.')));
        }else {
            if (!isset($_GET['search'])) {
                $office = $_GET['office'];
                if($office == 'ALL'){
                    $sql = "select `user_id` as id, `fname`, `lname`, `position`, `username`,`office_code` from `Profiles` where `position` != 0 order by `office_code` asc";
                    $stmt = $conn->prepare($sql);
                }
                else{
                    $sql = "select `user_id` as id, `fname`, `lname`, `position`, `username`,`office_code` from `Profiles` where `office_code` = ? order by `office_code` asc";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('s', $office);
                } 
                $stmt->execute();
                $result = $stmt->get_result();
    
                $staffs = array();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $staffs[] = array(
                            "id" => $row['id'],
                            "name" => $row['fname'] . ' ' . $row['lname'],
                            "username" => $row['username'],
                            "office" => $row['office_code'],
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
                
                if($office == 'ALL'){
                    $sql = "select `user_id` as id, `fname`, `lname`, `position`, `username`,`office_code` from `Profiles` where `fname` like ? or `lname` like ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ss',$search_tmp, $search_tmp);
                }
                else{
                    $sql = "select `user_id` as id, `fname`, `lname`, `position`, `username`,`office_code` from `Profiles` where `office_code` = ? and (`fname` like ? or `lname` like ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('sss', $office, $search_tmp, $search_tmp);
                }

                
                $stmt->execute();
    
                $result = $stmt->get_result();
                
                $staffs = array();
    
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $staffs[] = array(
                            "id" => $row['id'],
                            "name" => $row['fname'] . ' ' . $row['lname'],
                            "username" => $row['username'],
                            "office" => $row['office_code'],
                            "position" => $row['position']
                        );
                    }
                }
                die(json_encode(array("status" => "success", "data" => $staffs)));
                
            }
        }
    }
    else {
        die(json_encode(array('status' => 'error', 'message' => 'B???n kh??ng c?? quy???n truy c???p trang n??y')));
    }
?>