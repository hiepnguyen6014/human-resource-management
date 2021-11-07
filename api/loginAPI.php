<?php
	session_start();
	require('connection.php');

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
	} else {
		Header("Location: /login.php");
	}
    $sql = "SELECT `type` FROM `account` WHERE username = '$username' AND password = '$password' LIMIT 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$_SESSION['type'] = $row['type'];
		$_SESSION['username'] = $username;
	}
	
	$conn->close();
	Header("Location: /login.php");

?>