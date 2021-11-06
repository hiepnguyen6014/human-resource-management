<?php

    /* require('/admin/db.php'); */

    /* if ($conn->connect_error) {
        die('Không thể kết nối database: ' . $conn->connect_error);
    } */

	/* echo "Kết nối thành công tới database<br><br>";

	$sql = "SELECT * from product";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			echo json_encode($row);
			echo "<br>";
		}
	}
	else {
		echo "Bảng chưa có dữ liệu";
	}
    $conn->close(); */
	$username = $_POST['username'];
	$password = $_POST['password'];
	echo $username;
?>