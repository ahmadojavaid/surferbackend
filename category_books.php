<?php include("includes/header.php");

	require("includes/function.php");
	$kwallpaper=new  k_wallpaper;
	
	
	//Get all Category 
	
	if(isset($_GET['product_id']))
	{
		$kwallpaper->deletelevel();
		
		 
		echo "<script>document.location='manage_levels.php';</script>"; 
	    exit;
		
	}
	 //$qry="SELECT tbl_products.name,tbl_products.company_name,tbl_products.model,tbl_products.size,tbl_products.image,tbl_category.cat_id,tbl_category.cat_name FROM tbl_products,tbl_category where tbl_category.cat_id=tbl_products.cat_id AND tbl_products.cat_id='".$_REQUEST['cat_id']."'";
	 	$qry="SELECT * FROM tbl_products where cat_id='".$_REQUEST['cat_id']."'";
	$result=mysql_query($qry);
	
	//while($res=$mysql_fetch_array($result)){
		//print_r($res);die;
		//}
		
	 
?>
                <!-- h2 stays for breadcrumbs -->
              
                <div id="main">
                  <h2> Manage Products &raquo;</h2>
                
                
                	<form action="" class="jNice">
					 <h3 class="abtn"><a href="add_books.php?cat_id=<?php echo $_REQUEST['cat_id'] ?>">Add Books
                     </a></h3>
					 
                    	<table cellpadding="0" cellspacing="0">
						<tr align="center">
						<th>image</th>						 
						<th>Name</th>
						<th>Edit</th>
						<th>Delete</th>
						
						</tr>
						<?php
						
							$i=0;
							while($row=mysql_fetch_array($result))
							//print_r($row); die;
							{
							
						?>	
						                  
							<tr <?php if($i%2==0){?>class="odd"<?php }?> align="center">
                             <td><img src="<?php echo $row['image'];?>" style="width:47px; height:40px;" /></td>
                                <!--<td><?php //echo $row['product_id'];?></td>-->
                                <td><?php echo $row['name'];?></td>
                                <td class="action"><a href="edit_products.php?product_id=<?php echo $row['product_id'];?>" class="edit">Edit</a></td>
                                <td class="action"><a href="?actions=add_product&actions_type=delete&product_id=<?php echo $row['product_id'];?>" class="delete" onclick="return confirm('Are you sure you want to delete this Level and related Questions?');">Delete</a></td>
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
