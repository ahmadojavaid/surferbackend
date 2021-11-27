<?php //error_reporting(1);
require_once("thumbnail_images.class.php");
class k_wallpaper

{


}


  if(isset($_REQUEST["actions"]) && $_REQUEST["actions"]==="add_books")
	  {

		  if(isset($_REQUEST["actions_type"]) && $_REQUEST["actions_type"]==="add")

		  {
			 
			/* .................................................
			Upload file pdf or doc
			
			....................................................*/
			
			 if($_FILES["upload"]["name"]!=''){
				  $namefiel=$_FILES["upload"]["name"];
				 
				 
				 $filtername=str_replace(' ','_', $namefiel);
					$allowedExts = array("pdf", "doc");
						$temp = explode(".",$filtername);
						
						//print_r($temp);die;
						
						$extension = end($temp);
						if (($_FILES["upload"]["type"] == "application/pdf")
						|| ($_FILES["upload"]["type"] == "application/doc")
						
						
						&& in_array($extension, $allowedExts))
						  {
						  if ($_FILES["upload"]["error"] > 0)
							{
							echo "Return Code: " . $_FILES["upload"]["error"] . "<br>";
							}
						  else
							{
							 "Upload: " . $_FILES["upload"]["name"] . "<br>";
							 "Type: " . $_FILES["upload"]["type"] . "<br>";
							// "Size: " . ($_FILES["upload"]["size"] / 1024000) . " kB<br>";
							 "Temp file: " . $_FILES["upload"]["tmp_name"] . "<br>";
						
							if (file_exists("uploads/pdf_books/" .$filtername))
							  {
							  echo $filtername . " already exists. ";
							  }
							else
							  {
								  
							  move_uploaded_file($_FILES["upload"]["tmp_name"],
							  "uploads/pdf_books/" .$filtername);
						  echo "Stored in: " . "uploads/pdf_books/" .$filtername;
							  }
							}
						  }
						else
						  {
						  echo "Invalid file";
						  }
				 
				 }
				 if($_FILES["iamge1"]["name"]!=''){
					$imagename=$_FILES["iamge1"]["name"];
					 
					
					/* add gmt date with image name(start)  */
					 $filterImage=str_replace(' ','_', $imagename);
					 $temp = explode(".", $filterImage);
					 $extension = end($temp);
					
					 $filterImage = substr($filterImage, 0, strrpos($filterImage, "."));
					 $gmtimenow = time() - (int)substr(date('O'),0,3)*60*60;
					
					 $filterImage=$filterImage.'_'.$gmtimenow.'.'.$extension;
					/* add gmt date with image name(start)  */
						 
				$allowedExts = array("gif", "jpeg", "jpg", "png","JPG");

				$temp = explode(".", $filterImage);

				 $extension = end($temp);

				$dir = '';

				if ((($_FILES["iamge1"]["type"] == "image/gif")

				|| ($_FILES["iamge1"]["type"] == "image/jpeg")

				|| ($_FILES["iamge1"]["type"] == "image/jpg")

				|| ($_FILES["iamge1"]["type"] == "image/jpeg")

				|| ($_FILES["iamge1"]["type"] == "image/x-png")
				|| ($_FILES["iamge1"]["type"] == "image/JPG")

				|| ($_FILES["iamge1"]["type"] == "image/png"))

				

				&& in_array($extension, $allowedExts)) {

					

				  if ($_FILES["iamge1"]["error"] > 0) {

					echo "Return Code: " . $_FILES["iamge1"]["error"] . "<br>";

					

				  } else {

						 "Upload: " . $_FILES["iamge1"]["name"] . "<br>";

						"Type: " . $_FILES["iamge1"]["type"] . "<br>";

					 "Size: " . ($_FILES["iamge1"]["size"] / 1024) . " kB<br>";

					"Temp file: " . $_FILES["iamge1"]["tmp_name"] . "<br>";

				  

					if (file_exists("uploads/thumbnail/" . $filterImage)) {

					   $filterImage . " already exists. ";

					} else {

					  move_uploaded_file($_FILES["iamge1"]["tmp_name"],"uploads/thumbnail/". $filterImage);

					echo "Stored in: " . $dir . $filterImage;

					}

				  }

				} else {

				  echo "Invalid file";

				}

					 
					 }
 $sql="insert into tbl_products (cat_id,name,description,author,bookurl,image) values('".$_POST["category"]."','".$_POST["name"]."','".$_POST["description"]."','".$_POST["author"]."','".$filtername."','".$filterImage."')";	  

			   mysql_query($sql) or die(mysql_error());

			   
				 ?>
<script>  window.location.href ="books.php"</script>
<?php

			  

			   

			  

		  }

		   else if(isset($_REQUEST["actions_type"]) && $_REQUEST["actions_type"]==="update_book")

		  { 
		
		 
		  
			if($_FILES["upload"]["name"]!=='' && $_FILES["image1"]["name"]!=='' ){
				 if($_FILES["upload"]["name"]!=''){
				  $namefiel=$_FILES["upload"]["name"];
				 
				 
						$filtername=str_replace(' ','_', $namefiel);
						$allowedExts = array("pdf", "doc");
						$temp = explode(".",$filtername);
						
						//print_r($temp);die;
						
						$extension = end($temp);
						if (($_FILES["upload"]["type"] == "application/pdf")
						|| ($_FILES["upload"]["type"] == "application/doc")
						
						
						&& in_array($extension, $allowedExts))
						  {
						  if ($_FILES["upload"]["error"] > 0)
							{
							echo "Return Code: " . $_FILES["upload"]["error"] . "<br>";
							}
						  else
							{
							echo "Upload: " . $_FILES["upload"]["name"] . "<br>";
							echo "Type: " . $_FILES["upload"]["type"] . "<br>";
							echo "Size: " . ($_FILES["upload"]["size"] / 1024000) . " kB<br>";
							echo "Temp file: " . $_FILES["upload"]["tmp_name"] . "<br>";
						
							if (file_exists("uploads/pdf_books/" .$filtername))
							  {
							  echo $filtername . " already exists. ";
							  }
							else
							  {
							  move_uploaded_file($_FILES["upload"]["tmp_name"],
							  "uploads/pdf_books/" .$filtername);
						  echo "Stored in: " . "uploads/pdf_books/" .$filtername;
							  }
							}
						  }
						else
						  {
						  echo "Invalid file";
						  }
				 
				 }
				 if($_FILES["image1"]["name"]!=''){
					 $imagename=$_FILES['iamge1']["name"];
					 
				 
				 $filterImage=str_replace(' ','_', $imagename);
					/* add gmt date with image name(start)  */
					 $filterImage=str_replace(' ','_', $imagename);
					 $temp = explode(".", $filterImage);
					 $extension = end($temp);
					
					 $filterImage = substr($filterImage, 0, strrpos($filterImage, "."));
					 $gmtimenow = time() - (int)substr(date('O'),0,3)*60*60;
					
					 $filterImage=$filterImage.'_'.$gmtimenow.'.'.$extension;
					/* add gmt date with image name(start)  */
						 
				$allowedExts = array("gif", "jpeg", "jpg", "png","JPG");

				$temp = explode(".", $filterImage);

				 $extension = end($temp);

				$dir = '';

				if ((($_FILES["iamge1"]["type"] == "image/gif")

				|| ($_FILES["iamge1"]["type"] == "image/jpeg")

				|| ($_FILES["iamge1"]["type"] == "image/jpg")

				|| ($_FILES["iamge1"]["type"] == "image/pjpeg")

				|| ($_FILES["iamge1"]["type"] == "image/x-png")
				|| ($_FILES["iamge1"]["type"] == "image/JPG")

				|| ($_FILES["iamge1"]["type"] == "image/png"))

				

				&& in_array($extension, $allowedExts)) {

					

				  if ($_FILES["iamge1"]["error"] > 0) {

					echo "Return Code: " . $_FILES["iamge1"]["error"] . "<br>";

					

				  } else {

						 "Upload: " . $_FILES["iamge1"]["name"] . "<br>";

						"Type: " . $_FILES["iamge1"]["type"] . "<br>";

					 "Size: " . ($_FILES["iamge1"]["size"] / 1024) . " kB<br>";

					"Temp file: " . $_FILES["iamge1"]["tmp_name"] . "<br>";

				  

					if (file_exists("uploads/thumbnail/" . $filterImage)) {

					   $filterImage . " already exists. ";

					} else {

					  move_uploaded_file($_FILES["iamge1"]["tmp_name"],"uploads/thumbnail/". $filterImage);

					echo "Stored in: " . $dir . $filterImage;die;

					}

				  }

				} else {

				  echo "Invalid file";

				}

					 
					 }
				
					 $sql="UPDATE tbl_products SET name='".$_POST["name"]."', description='".$_POST["description"]."',author='".$_POST["author"]."' ,bookurl='".$filtername."',image='".$filterImage."' WHERE product_id='".$_REQUEST["product_id"]."'";

				   mysql_query($sql) or die(mysql_error());
					?>
       				 <script>  window.location.href ="books.php"</script>
					<?php	 
			
				}
				else if($_FILES["upload"]["name"]!=''   &&  $_FILES["iamge1"]["name"]==0){
					
					 if($_FILES["upload"]["name"]!=''){
				 $namefiel=$_FILES["upload"]["name"];
				 
				 
				 $filtername=str_replace(' ','_', $namefiel);
					$allowedExts = array("pdf", "doc");
						$temp = explode(".",$filtername);
						
						//print_r($temp);die;
						
						$extension = end($temp);
						if (($_FILES["upload"]["type"] == "application/pdf")
						|| ($_FILES["upload"]["type"] == "application/doc")
						
						
						&& in_array($extension, $allowedExts))
						  {
						  if ($_FILES["upload"]["error"] > 0)
							{
							echo "Return Code: " . $_FILES["upload"]["error"] . "<br>";die;
							}
						  else
							{
							echo "Upload: " . $_FILES["upload"]["name"] . "<br>";
							echo "Type: " . $_FILES["upload"]["type"] . "<br>";
							echo "Size: " . ($_FILES["upload"]["size"] / 1024000) . " kB<br>";
							echo "Temp file: " . $_FILES["upload"]["tmp_name"] . "<br>";
						
							if (file_exists("uploads/pdf_books/" .$filtername))
							  {
							  echo $filtername . " already exists. ";
							  }
							else
							  {
							  move_uploaded_file($_FILES["upload"]["tmp_name"],
							  "uploads/pdf_books/" .$filtername);
						  echo "Stored in: " . "uploads/pdf_books/" .$filtername;
							  }
							}
						  }
						else
						  {
						  echo "Invalid file";
						  }
				 
				 
					 $sql="UPDATE tbl_products SET name='".$_POST["name"]."',description='".$_POST["description"]."',author='".$_POST["author"]."' ,bookurl='".$filtername."' WHERE product_id='".$_REQUEST["product_id"]."'";

				   mysql_query($sql) or die(mysql_error());
					?>
       				 <script>  window.location.href ="books.php"</script>
					<?php
					
					}
				}
					
				else if($_FILES['iamge1']['name']!='' &&  $_FILES["upload"]["name"]==0)
					{
						
					 $imagename=$_FILES['iamge1']['name'];
					 
					
					/* add gmt date with image name(start)  */
					 $filterImage=str_replace(' ','_', $imagename);
					 $temp = explode(".", $filterImage);
					 $extension = end($temp);
					
					 $filterImage = substr($filterImage, 0, strrpos($filterImage, "."));
					 $gmtimenow = time() - (int)substr(date('O'),0,3)*60*60;
					
					 $filterImage=$filterImage.'_'.$gmtimenow.'.'.$extension;
					/* add gmt date with image name(start)  */
						 
				 $allowedExts = array('gif','jpeg','jpg','png','JPG');

				 $temp = explode(".", $filterImage);

				 $extension = end($temp);

				$dir = '';

				if ((($_FILES['iamge1']['type'] == "image/gif")

				|| ($_FILES['iamge1']['type'] == "image/jpeg")

				|| ($_FILES['iamge1']['type'] == "image/jpg")

				|| ($_FILES['iamge1']['type'] == "image/pjpeg")

				|| ($_FILES['iamge1']['type'] == "image/x-png")
				|| ($_FILES['iamge1']['type'] == "image/JPG")
				|| ($_FILES['iamge1']['type'] == "image/png"))

				

				&& in_array($extension, $allowedExts)) {

					

				  if ($_FILES['image1']['error'] > 0) {

					echo "Return Code: " . $_FILES['image1']['error'] . "<br>";

					

				  } else {

						 "Upload: " . $_FILES['iamge1']['name'] . "<br>";

						 "Type: " . $_FILES['iamge1']['type'] . "<br>";

						 "Size: " . ($_FILES['iamge1']['size'] / 100024) . " kB<br>";

						"Temp file: " . $_FILES['iamge1']['tmp_name'] . "<br>";

				  

					if (file_exists("uploads/thumbnail/" . $filterImage)) {

					   echo $filterImage . " already exists. "; 

					} else {

					   move_uploaded_file($_FILES['iamge1']['tmp_name'],"uploads/thumbnail/". $filterImage);

					 "Stored in: " . "uploads/thumbnail/" . $filterImage;

					}

				  }

				} else {

				  echo "Invalid file";

				}
					 $sql="UPDATE tbl_products SET name='".$_POST["name"]."', description='".$_POST["description"]."',author='".$_POST["author"]."' ,image='".$filterImage."' WHERE product_id='".$_REQUEST["product_id"]."'";

				   mysql_query($sql) or die(mysql_error());
					?>
       				 <script>  window.location.href ="books.php"</script>
					<?php

			 }
					else{
						//echo $_POST["category"];die;
	$sql="UPDATE tbl_products SET name='".$_POST["name"]."', description='".$_POST["description"]."', cat_id='".$_POST["category"]."',author='".$_POST["author"]."'  WHERE product_id='".$_REQUEST["product_id"]."'";
					  mysql_query($sql) or die(mysql_error());
					?>
       				 <script>  window.location.href ="books.php"</script>
					<?php
							}
				
			
		  }

		   else if(isset($_REQUEST["actions_type"]) && $_REQUEST["actions_type"]==="delete")

		  { 
			$sql="delete from tbl_products WHERE product_id='".$_REQUEST["product_id"]."'";
	
					   mysql_query($sql) or die(mysql_error());
				?>
				<script>  window.location.href ="books.php"</script>
                <?php

				  

		  }

	  }



if(isset($_REQUEST["actions"]) && $_REQUEST["actions"]==="category")

{
    if(isset($_REQUEST["actions_type"]) && $_REQUEST["actions_type"]==="add")

    {
        $sql="insert into category (name, updated_at) values('".$_POST["name"]."', Now())";
        mysqli_query($cn, $sql) or die(mysqli_error());
        // @header("Location:category.php");
        ?>
        <script>  window.location.href ="category_list.php"</script>
    <?php

    }

    if(isset($_REQUEST["actions_type"]) && $_REQUEST["actions_type"]==="update")

    {
        $sql="UPDATE category SET name='".$_POST["name"]."', updated_at= Now() WHERE id='".$_REQUEST["id"]."'";
        //print_r($sql);die();
        mysqli_query($cn, $sql) or die(mysqli_error());

        //@header("Location:category.php");
        ?>
        <script>  window.location.href ="category_list.php"</script>
    <?php

    }
    else if(isset($_REQUEST["actions_type"]) && $_REQUEST["actions_type"]==="delete")

    {  $sql="delete from category WHERE id='".$_REQUEST["id"]."'";

        mysqli_query($cn, $sql) or die(mysqli_error());

        // @header("Location:category.php");
        ?>
        <script>  window.location.href ="category_list.php"</script>
    <?php

    }
}

	  
?>