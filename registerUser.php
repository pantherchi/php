<?php

require '/const.php';

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
	printf("connection failed: %s \n", mysqli_connect_errno());
	exit();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['firstname']) and isset($_POST['secondname']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['gender']) and isset($_POST['dob'])){

		$firstname = $_POST['firstname'];
		$secondname = $_POST['secondname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];

		$qry = "INSERT INTO `users` (`id`, `firstname`, `secondname`, `email` , `password` , `gender` , `dob`) VALUES (NULL, '$firstname', '$secondname', '$email', '$password', '$gender', '$dob');";

		if (mysqli_query($con, $qry)) {
			echo "Successfully registered!...";
		}else{
			echo "Something wrong...";
		}
	}
}
?>
