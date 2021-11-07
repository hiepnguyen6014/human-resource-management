<?php
    require('../connection.php');

    $sql = "SELECT `id`, `title`, `description`, `startDate`, `endDate`, `status` FROM `task`";
	$result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode(array('status' => 'success', 'data' => $data));

?>