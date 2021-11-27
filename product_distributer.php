<?php include("includes/header.php");

	require("includes/function.php");
	$kwallpaper=new  k_wallpaper;
	
	
	//Get all Category 
	$qry="SELECT * FROM distributer";
	$result=mysql_query($qry);
	
	
	 
?>
                <!-- h2 stays for breadcrumbs -->
              
                <div id="main">
                  <h2> Manage Locations &raquo;</h2>
                
                
                	<form action="" class="jNice">
					 <h3 class="abtn"><a href="add_product_distributer.php?add=yes">Add Location
                     </a></h3>
					 
                    	<table cellpadding="0" cellspacing="0">
						<tr align="center">
						<!--<th>image</th>	-->					 
						<th>Title</th>
                        <th>Phone</th>
                        <th>Address</th>
                         <th>Longitude</th>
                        <th>Latitude</th>
                       <th>Edit</th>
						<th>Delete</th>
						
						</tr>
						<?php
						
							$i=0;
							while($row=mysql_fetch_array($result))
							
							{
							
						?>	
						                  
							<tr <?php if($i%2==0){?>class="odd"<?php }?> align="center">
                             <td><?php echo $row['distributer_name'];?></td>
                             <td><?php echo $row['distributer_phone'];?></td>
                              <td><?php echo $row['distributer_address'];?></td>
                               <td><?php echo $row['distributer_longitude'];?></td>
                                 <td><?php echo $row['distributer_latitude'];?></td>
                                <!--<td><?php //echo $row['product_id'];?></td>-->
                               
                                <td class="action"><a href="edit_product_distributer.php?distributer_id=<?php echo $row['distributer_id'];?>" class="edit">Edit</a></td>
                                <td class="action"><a href="?actions=distributer&actions_type=delete&distributer_id=<?php echo $row['distributer_id'];?>" class="delete" onclick="return confirm('Are you sure you want to delete this Level and related Questions?');">Delete</a></td>
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
