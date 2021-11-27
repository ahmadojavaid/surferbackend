<?php include("includes/header.php");

	require("includes/function.php");
	$kwallpaper=new  k_wallpaper;
	
	
	//Get all Category 
	$qry="SELECT * FROM category";
	$result=mysqli_query($cn, $qry);
	
		
	 
?>
                <!-- h2 stays for breadcrumbs -->
              
                <div id="main">
                  <h2>Category List &raquo;</h2>
                
                
                	<form action="" class="jNice">
					 <h3 class="abtn"><a href="add_category.php?add=yes">Add Category
                     </a></h3>
					 
                    	<table cellpadding="0" cellspacing="0">
						<tr align="center">
						<th>Id</th>						 
						<th>Category Name</th>
						<th>Edit</th>
						<th>Delete</th>
						
						</tr>
						<?php
						
							$i=0;
							while($row=mysqli_fetch_array($result))
							{
							
						?>	
						                  
							<tr <?php if($i%2==0){?>class="odd"<?php }?> align="center">
                             <td><?php echo $row['id'];?></td>
                               
                                <td><?php echo $row['name'];?></td>
                                <td class="action"><a href="edit_category.php?id=<?php echo $row['id'];?>" class="edit">Edit</a></td>
                                <td class="action"><a href="?actions=category&actions_type=delete&id=<?php echo $row['id'];?>" class="delete" onclick="return confirm('Are you sure you want to delete this Category?');">Delete</a></td>
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
<style>
.odd a{
	color:#fff !important;
	}
	.jNice a {
    color: #fff;
}
</style>