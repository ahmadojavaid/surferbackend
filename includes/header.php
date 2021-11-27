<?php include("includes/connection.php");

      include("includes/session_check.php");

	  

	  //Get file name

	  $currentFile = $_SERVER["SCRIPT_NAME"];

      $parts = Explode('/', $currentFile);

      $currentFile = $parts[count($parts) - 1]; 	  

	   

	  

?>

 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>General Services</title>



<!-- CSS -->

<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />

<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->

<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->



<link rel="shortcut icon" href="images/favicon.png" />



<!-- JavaScripts-->

<script type="text/javascript" src="style/js/jquery.js"></script>

<script type="text/javascript" src="style/js/jNice.js"></script>

</head>



<body>

	<div id="wrapper">

    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->

    	<h1 style="display:none"><a href=""><span>Transdmin Light</span></a></h1>

        

        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->

        <ul id="mainNav">

        	<li><a href="category_list.php" <?php if($currentFile=="category_list.php"){?>class="active"<?php }?>>General Services</a></li> <!-- Use the "active" class for the active menu item  -->

        	 

        	<li class="logout"><a href="logout.php">LOGOUT</a></li>

        </ul>

        <!-- // #end mainNav -->

        

        <div id="containerHolder">

			<div id="container">

        		<div id="sidebar">

                	<ul class="sideNav">
						<li><a href="category_list.php" <?php if($currentFile=="category_list.php")

															{?>class="active"<?php }?>>Category</a></li>  
                    	<li><a href="books.php" <?php if($currentFile=="books.php")

															{?>class="active"<?php }?>>Users</a></li>    
                         <!--	<li><a href="product_distributer.php" <?php //if($currentFile=="product_distributer.php")

															//{?>class="active"<?php //}?>>Product Distributer</a></li>                 	 

                    	<li style="display:none;"><a href="manage_questions.php" <?php //if($currentFile=="manage_questions.php")

															//{?>class="active"<?php //}?>>Questions</a></li>
                        <li><a href="news.php" <?php //if($currentFile=="news.php")

															//{?>class="active"<?php // }?>>News</a></li> 
                       <li><a href="event.php" <?php //if($currentFile=="event.php")

															//{?>class="active"<?php// }?>>Events</a></li> 
                        <li><a href="location.php" <?php //if($currentFile=="locatiopn.php")

															//{//?>class="active"<?php //}?>>Location</a></li>  
                                                        
                                                      
                                                            
                       
                                                            

                        <li><a href="profile.php" 

      <?php //if($currentFile=="profile.php"){?>class="active"<?php //}?>>Profile</a></li> -->

                    	 

                    </ul>

                    <!-- // .sideNav -->

                </div>    

                <!-- // #sidebar -->