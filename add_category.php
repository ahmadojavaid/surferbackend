<?php include("includes/header.php");

	require("includes/function.php");
	$kwallpaper=new  k_wallpaper;
	
	
	//Get all Level 
	$qry="SELECT * FROM tbl_levels";
	$result=mysqli_query($cn, $qry);

	
?>
<script src="js/levels.js" type="text/javascript"></script>
  
                <!-- h2 stays for breadcrumbs -->                                
                <div id="main">


                     <h3>Add Category</h3>                   	
					
					<form action="" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="actions" value="category"/>
                    <input type="hidden" name="actions_type" value="add"/>
						<fieldset>
						
						
				                      <p><label>Name:</label>
                            	<input type="text" name="name" id="name" value="" class="text-long" />
                            	</p>
                        		<input type="submit" name="submit" value="Submit" />
                        </fieldset>
                    </form>
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
<?php include("includes/footer.php");?>       
