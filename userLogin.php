<?php

require_once '/const.php';

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
	printf("connection failed: %s \n", mysqli_connect_errno());
	exit();
}
$res = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['email']) and isset($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		if ($qry = mysqli_query($con, "SELECT * FROM `users` WHERE email LIKE '$email' AND password LIKE '$password';")) {
			$row_cnt = mysqli_num_rows($qry);
			if ($row_cnt == 1) {
				$stmt = mysqli_query($con,"SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password';");
				// $row = mysqli_fetch_assoc($stmt);
				// echo $row['id']."<br>";
				// while ($row = mysqli_fetch_assoc($stmt)) {
				// 	echo $row['id']."<br>";
				// 	echo $row['firstname']."<br>";
				// 	echo $row['secondname']."<br>";
				// 	echo $row['email']."<br>";
				// 	echo $row['gender']."<br>";
				// 	echo $row['dob']."<br>";
				// }
				printf("Data Found");
			}else {
				printf("Error");
			}

			mysqli_free_result($qry);
		}
	}
}
mysqli_close($con);
echo json_encode($res);
?>
