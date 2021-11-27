<?php 
	include("conn.php");
	

	if (isset($_POST['submit'])) {
	
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "select * from users where email = '".$username."' and password = '".$password."' ";
		$result = mysqli_query($conn, $query);
		$re = mysqli_num_rows($result);

		if ($re) {
			$data = mysqli_fetch_array($result);
			//print_r($data);
			$message = ['message' => $data];
			exit(json_encode($message));
		} else {
			$message = ['message' => 'credentials doesnot match!! '];
			exit(json_encode($message));
		}
	
}

?>



<!DOCTYPE html5>
<html>
<head>
 <title></title>
</head>
<body>
<div class="container">
<h3>Logininform</h3>
<form  method="post" action="" accept-charset="utf-8">
	
	
	Username:<input type="email" name="username"><br><br>
	Password:<input type="password" name="password"><br><br>
	
	<input type="submit" name="submit" value="Signin">
</form>
</div>
</body>
</html>