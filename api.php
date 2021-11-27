<?php 
include("includes/connection.php");



	

	 if(isset($_GET['category']))

	{

		$limit=$_GET['category'];	 	

		$query="SELECT * FROM category";
  		$re=mysqli_query($cn, $query);
		

	}

	// For users

	elseif(isset($_POST['signup']))

		{
			//echo '<pre>';print_r($_POST);die;

			$name = $_POST['name'];
			$username = $_POST['user_name'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$usertype = $_POST['user_type'];
			$category = $_POST['category'];
			$experience = $_POST['experience'];
			$description = $_POST['description'];


			$image='';
            if($_FILES['image']["name"]){
                $image = $_FILES['image']["name"];
                $target_file = basename($_FILES["image"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $filename  = time() . '.'.$imageFileType;// . $image->getClientOriginalExtension();

                $path = __DIR__ . "/uploads/" . $filename;
                move_uploaded_file($_FILES["image"]["tmp_name"], $path);

                 
                    $image = $filename;
             
            }
				 	

			$query = "insert into users (name, user_name, email, password, address, phone, image, user_type,
			 category, experience, description, updated_at) values ('".$name."', '".$username."', '".$email."',
			  '".$password."', '".$address."', '".$phone."', '".$image."', '".$usertype."', '".$category."',
			   '".$experience."', '".$description."', Now())";
			//echo($query);die();
			$res = mysqli_query($cn, $query);
			if($res){
				$message = [ 'message' => 'record added successfully!!'];
				exit(json_encode($message));
			} else {
				$message = [ 'message' => 'There is an error!!'];
				exit(json_encode($message));
			}
		}

		elseif(isset($_POST['login']))
		 {
		 	//echo '<pre>';print_r($_POST);die;


			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$query = "select * from users where email = '".$username."' and password = '".$password."' ";
			$result = mysqli_query($cn, $query);
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
	
		elseif(isset($_POST['update']))

		{
			//echo '<pre>';print_r($_POST);die;

			if(isset($_POST['id']) && (isset($_POST['name']) || isset($_POST['user_name']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['address']) || isset($_POST['phone']) || isset($_POST['user_type']) || isset($_POST['category']) || isset($_POST['experience']) || isset($_POST['description']) || isset($_FILES['image']))){
				

	            $query = "update users set";


	            if(isset($_POST['name'])){
	            	$query .= " name='".$_POST['name']."',";	
	            }
	            if(isset($_POST['user_name'])){
	            	$query .= " user_name='".$_POST['user_name']."'," ;	
	            }
	            if(isset($_POST['email'])){
	            	$query .= " email='".$_POST['email']."'," ;	
	            }
	            if(isset($_POST['password'])){
	            	$query .= " password='".md5($_POST['password'])."'," ;	
	            }
	            if(isset($_POST['address'])){
	            	$query .= " address='".$_POST['address']."'," ;	
	            }
	            if(isset($_POST['phone'])){
	            	$query .= " phone='".$_POST['phone']."'," ;	
	            }
	             if(isset($_FILES['image'])){
	            	$image='';
		            if($_FILES['image']["name"]){
		                $image = $_FILES['image']["name"];
		                $target_file = basename($_FILES["image"]["name"]);
		                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		                $filename  = time() . '.'.$imageFileType;// . $image->getClientOriginalExtension();

		                $path = __DIR__ . "/uploads/" . $filename;
		                move_uploaded_file($_FILES["image"]["tmp_name"], $path);

		                 
		                    $image = $filename;
		             
		            }
	            	$query .= " image='".$image."',";	
	            }
	            if(isset($_POST['user_type'])){
	            	$query .= " user_type='".$_POST['user_type']."'," ;	
	            }
	            if(isset($_POST['category'])){
	            	$query .= " category='".$_POST['category']."'," ;	
	            }
	            if(isset($_POST['experience'])){
	            	$query .= " experience='".$_POST['experience']."'," ;	
	            }
	            if(isset($_POST['description'])){
	            	$query .= " description='".$_POST['description']."'," ;	
	            }
	            $query .= " updated_at= Now() where id ='".$_POST['id']."'" ;

	            /*$query = "update users set name='".$name."', user_name='".$username."', email='".$email."',
	             password='".$password."', address='".$address."', phone='".$phone."', image='".$image."',
	              user_type='".$usertype."', category='".$category."', experience='".$experience."',
	               description='".$description."', updated_at= Now() where id ='".$id."' " ;*/
					 	
				//echo($query);die();
				$re = mysqli_query($cn, $query);
				if($re){
					$message = [ 'message' => 'User updated successfully!!'];
					exit(json_encode($message));
				} else {
					$message = [ 'message' => 'There is an error!!'];
					exit(json_encode($message));
				}

				}else{
					$message = [ 'message' => 'There is nothing to update!!'];
					exit(json_encode($message));
			}

		}

	elseif(isset($_POST['delete']))
 	{
  		if (isset($_POST['user_id'])) {
  			
  			$id = $_POST['user_id'];

  			$query = "delete from users where id ='".$id."' " ;
  			$re = mysqli_query($cn, $query);

  			if ($re) {
  				$message = ['message' => 'User has been deleted!!'];
  				exit(json_encode($message));
  			} else {
  				$message = ['message' => 'There is an error!!'];
  				exit(json_encode($message));
  			}
  		}
	}

	
	elseif(isset($_GET['users']))
 	{
  		$limit=$_GET['users']; 
  
  
  		$query="SELECT * FROM users";
  		$re=mysqli_query($cn, $query);
  		 
	}

	elseif(isset($_POST['employees']))
 	{
 		//echo '<pre>';print_r($_POST);die;
  		$limit=$_POST['employees']; 

  		if (isset($_POST['category'])) {

	  		$query="SELECT * FROM users where user_type = 1 and category = '".$_POST['category']."' ";
	  		//die($query);
	  		$results=mysqli_query($cn, $query);

	  		foreach ($results as $res) {
	  			//print_r($res['id']);die();
	  			$sql = "select rating from jobs where emp_id = '".$res['id']."'";
	  			//echo($sql);die();
	  			$query = mysqli_query($cn, $sql);
	  			//print_r($query);die();
	  			if ($query->num_rows > 0) {
	  			$getrating = 0;
	  			while($row = $query->fetch_assoc()) {
        		$getrating += $row["rating"] ;
    			}
	  			$average_of_rating = $getrating / mysqli_num_rows($query);
	  			//print_r($average_of_rating);die();
	  			$re = [
	  			'id'=> $res['id'],
	  			'name'=> $res['name'],
	  			'user_name'=> $res['user_name'],
	  			'email'=> $res['email'],
	  			'password'=> $res['password'],
	  			'address'=> $res['address'],
	  			'phone'=> $res['phone'],
	  			'image'=> $res['image'],
	  			'user_type'=> $res['user_type'],
	  			'category'=> $res['category'],
	  			'experience'=> $res['experience'],
	  			'description'=> $res['description'],
	  			'rating' => $average_of_rating
	  			];

	  			}
	  			//print_r($re); 
	  		}
	  		//print_r($re);die();

	  		if ($re) {
  				$data = $set['data'][]= $re;
  				//exit(json_encode($data));
  				echo $val= str_replace('\\/', '/', json_encode($set));
  				die;
  			} else {
  				$data = ['data' => 'There is an error!!'];
  				exit(json_encode($data));
  			}
	  		
  		}
  		 
	}

	elseif(isset($_GET['user_id']))
 	{
  		$limit=$_GET['user_id']; 
  
  
  		$query="SELECT * FROM users where user_id = '".$_GET['user_id']."' ";
  		$re=mysqli_query($cn, $query);
  		/*while ($row = mysqli_fetch_array($re)) {
  			echo $row;
  			echo $row['user_name'];
  		}*/
  	}
  	elseif(isset($_POST['start_job']))
 	{

  		$limit=$_POST['start_job'];
  		//print_r($_POST);die();

  		if (isset($_POST['user_id']) && isset($_POST['emp_id'])) {

  			$userId = $_POST['user_id'];
  			$useraddress = $_POST['user_address'];
  		 	$username = $_POST['user_name'];
  		 	$userphone = $_POST['user_phone'];
  			$empId = $_POST['emp_id'];
  		 	$empname = $_POST['emp_name'];
  		 	$empphone = $_POST['emp_phone'];
  		 	$empimage = $_POST['emp_image'];
  		 	$rating = $_POST['rating'];
  		 	$jobDescription = $_POST['job_description'];
  		 	//echo '<pre>';print_r($_POST);die;

  		 	$query= "insert into jobs (user_id, user_name, user_address, user_phone, emp_id, emp_name, emp_phone, emp_image, rating, job_description, job_status, updated_at)
  		 	 values ('".$userId."', '".$username."', '".$useraddress."','".$userphone."','".$empId."', '".$empname."', '".$empphone."', '".$empimage."', '".$rating."', '".$jobDescription."', '1', Now()) ";
	  		//echo($query);die();
	  		$res=mysqli_query($cn, $query);

	  		if($res){
				$message = [ 'message' => 'job saved successfully!!'];
				exit(json_encode($message));
			} else {
				$message = [ 'message' => 'There is an error!!'];
				exit(json_encode($message));
			}
	  		
  		 } 
  
  	}

  	elseif(isset($_POST['user_cancel_job']))
 	{
  		$limit=$_POST['user_cancel_job'];

  		if (isset($_POST['id'])) {

  		 	$query="delete from jobs where id = '".$_POST['id']."' ";
  		 	//echo($query);die();
	  		$re=mysqli_query($cn, $query);

	  		if($re){
					$message = [ 'message' => 'Job has been canceled!!'];
					exit(json_encode($message));
				} else {
					$message = [ 'message' => 'There is an error!!'];
					exit(json_encode($message));
				}
	  		
  		 } 
  
  	}

  	elseif(isset($_POST['emp_rating']))
 	{
  		$limit=$_POST['emp_rating'];

  		if (isset($_POST['id'])) {

  			$Id = $_POST['id'];
  		 	$rating = $_POST['rating'];
  		 	$comments = $_POST['comments'];

  		 	$query="update jobs set rating = '".$rating."', comments = '".$comments."', job_status = '0' where id = '".$_POST['id']."' ";
	  		//echo($query);die();
	  		$re=mysqli_query($cn, $query);
	  		if($re){
					$message = [ 'message' => 'Rating has been given!!'];
					exit(json_encode($message));
				} else {
					$message = [ 'message' => 'There is an error!!'];
					exit(json_encode($message));
				}
	  		
  		 } 
  
  	}

  	/*elseif(isset($_GET['user_jobs']))
 	{
  		$limit=$_GET['user_jobs'];

  		$userId = $_POST['user_id']; 
  
  		//$query="select jobs.*, users.name, users.phone from jobs,users where jobs.user_id = users.id and jobs.emp_id = users.id";
  		$query="SELECT jobs.*, users.name, users.phone from jobs LEFT OUTER JOIN users ON jobs.user_id = users.id WHERE jobs.emp_id = users.id";
  		$re=mysqli_query($cn, $query);
  		 
	}*/
	elseif (isset($_POST['user_jobs'])) {

		if (isset($_POST['user_id'])) {
			
			$id = $_POST['user_id'];

			$query = "select * from jobs where user_id = '".$id."' ";
			//echo($query);die();
			$re=mysqli_query($cn, $query);
		}
	}
	elseif (isset($_POST['employee_jobs'])) {
		
		if (isset($_POST['emp_id'])) {
			
			$id = $_POST['emp_id'];

			$query = "select * from jobs where emp_id = '".$id."' ";
			$re=mysqli_query($cn, $query);
		}
	}

	else

	{

		$query="SELECT lid,level_name,required_points FROM tbl_levels";

	}

	

	$resouter = mysqli_query($cn, $query);

     $set = array();

     

    @$total_records = mysqli_num_rows($resouter);//print_r($total_records);

if ($total_records!=''){
    if($total_records >= 1){

        while ($link = mysqli_fetch_array($resouter, MYSQL_ASSOC)){



            $set['data'][]= $link;


        }

    }

    echo $val= str_replace('\\/', '/', json_encode($set));

}
else{

   $message = [ 'message' => 'No Record found!!'];
    exit(json_encode($message));
}





?>