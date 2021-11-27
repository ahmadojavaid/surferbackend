<?php include("includes/header.php");

	require("includes/function.php");
	$kwallpaper=new  k_wallpaper;
	
				$qry="SELECT * FROM users";
				$result=mysqli_query($cn, $qry);

	
?>
                <!-- h2 stays for breadcrumbs -->
              
                <div id="main">
                  <h2> Manage Users &raquo;</h2>
                
                
                	<form action="" class="jNice">
					 <h3 class="abtn"><a href="add_books.php?cat_id=<?php echo $cat_id;?>">Add Book
                     </a></h3>
					 
                    	<table cellpadding="0" cellspacing="0">
						<tr align="center">					 
						<th>Name</th>
						<th>User Type</th>
						<th>Image</th>
                        
						<th>Edit</th>
						<th>Delete</th>
						
						</tr>
						<?php
						
							$i=0;
							while($row=mysqli_fetch_array($result))
							{
								//print_r($row);
							
						?>	
						                  
                                          
							<tr <?php if($i%2==0){?>class="odd"<?php }?> align="center">
                            <td><?php echo $row['name'];?></td>
                              <td><?php echo $row['user_type'];?></td>
                             <td><img src="uploads/<?php echo $row['user_type']; ?>" alt=""></td>
                             
                              
                                <td class="action"><a href="edit_books.php?product_id=<?php echo $row['product_id'];?>" class="edit">Edit</a></td>
                                <td class="action"><a href="?actions=add_books&actions_type=delete&product_id=<?php echo $row['product_id'];?>" class="delete" onclick="return confirm('Are you sure you want to delete this Book');">Delete</a></td>
                            </tr>  
                               
						<?php
							$i++;
							}
						?>	 
				        </table>
					 
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
<?php include("includes/footer.php");?>       
