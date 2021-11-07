<?php
	/* header('Access-Control-Allow-Methods: GET, POST'); */
    $host = 'mysql-server';
    $user = 'root';
    $pass = 'root';
    $db = 'enterprise';

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");

	if ($conn->connect_error) {
		die(json_encode(array('status' => false,'data' => $conn->connect_error)));
	}

	/* $sql = "SELECT * from product";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			echo json_encode($row);
			echo "<br>";
		}
	}
	else {
		echo json_decode(array('status' => true,'data' . $conn->connect_error));
	} */
?>
