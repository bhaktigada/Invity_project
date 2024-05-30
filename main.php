<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
    $username = $_POST['username'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','main');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into main(name, email, useraname, password) values(?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $email, $username, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>