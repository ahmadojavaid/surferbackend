<?php 
	include("conn.php");

	if (isset($_POST['submit'])) {
	

	$fullname = $_POST['full_name'];
	$username = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$usertype = $_POST['user_type'];
	$latitude = $_POST['latitude'];
	$langitude = $_POST['langitude'];
	$phone = $_POST['phone'];
	$bloodgroup = $_POST['blood_group'];
	$lastdonate = $_POST['last_donate'];

	$target_path = "uploads/";
			$target_file = $target_path . basename($_FILES["img"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
	    	$check = getimagesize($_FILES["img"]["tmp_name"]);
	    	if($check == false) {
	        $message = [ 'message' => 'File is not an image!!'];
				exit(json_encode($message));
	        $uploadOk = 0;
    		} else {
    			move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    		}
			}
				 	

	$query = "insert into users (full_name, user_name, email, password,
	 	gender, age, user_type, latitude, langitude, profile_pic, phone, blood_group, last_donate, created_at, updated_at) 
		values ('".$fullname."', '".$username."', '".$email."', '".$password."', '".$gender."', '".$age."', '".$usertype."','".$latitude."', '".$langitude."',
	 	'".$target_file."', '".$phone."', '" . $bloodgroup . "', '".$lastdonate."', Now(), Now())";
//echo($query);die();
	$res = mysqli_query($conn, $query);
	if($res){
		$message = [ 'message' => 'record added successfully!!'];
				exit(json_encode($message));
	} else {
		$message = [ 'message' => 'There is an error!!'];
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
<h3>SignUp form</h3>
<form  method="post" action="" accept-charset="utf-8" enctype="multipart/form-data">
	Full Name:<input type="text" id="full_name" name="full_name"><br><br>
	Username:<input type="text" name="user_name"><br><br>
	Email:<input type="email" name="email"><br><br>
	Password:<input type="password" name="password"><br><br>
	Gender:<input type="text" name="gender"><br><br>
	Age:<input type="age" name="age"><br><br>
	UserType:
	<select name="user_type">
		<option value="1">Donar</option>
		<option value="2">Seeker</option>
		<option value="3">Bloodbanks</option>
	</select><br><br>
	Latitude:<input type="text" name="latitude"><br><br>
	Langitude:<input type="text" name="langitude"><br><br>
	Image:<input type="file" name="img"><br><br>
	Phone:<input type="number" name="phone"><br><br>
	Blood group:<input type="text" name="blood_group"><br><br>
	Lastdonate:<input type="date" name="last_donate"><br><br>
	<input type="submit" name="submit" value="SignUp">
</form>
</div>


</body>
</html>