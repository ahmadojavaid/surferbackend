<?php include("includes/header.php");



	require("includes/function.php");

	$kwallpaper=new  k_wallpaper;

	

	
$cat_ids=$_REQUEST['cat_id'];
?>

<script src="js/levels.js" type="text/javascript"></script>

  

                <!-- h2 stays for breadcrumbs -->                                

                <div id="main">                	

					 <h2><a href="home.php">Dashboard</a> &raquo; <a href="#" class="active"></a></h2>

                     <h3>Add Product</h3>                   	

					

					<form action="" method="post"  enctype="multipart/form-data">

                    <input type="hidden" name="actions" value="add_books"/>

                    <input type="hidden" name="actions_type" value="add"/>

						<fieldset>
                         <p><label>Book Name:</label>

                            	<input type="text" name="name" id="name" value="" class="text-long" />

                            </p><p><label>Description:</label>
                              <textarea name="description" id="" value="" class="text-long"> </textarea></p>
                              
                                  <p><label>Author Name:</label>
                              <input type="text" name="author" id="" value="" class="text-long"/></p>

									
                                     <p><label>Books Category</label>
									<select name="category" id="" value="" class="text-long">
                                   <?php $qry="SELECT * FROM tbl_category";

										$result=mysql_query($qry);
										while($cat=mysql_fetch_array($result)){
											$cat_id=$cat['cat_id'];
											$cat_name=$cat['cat_name'];?>
											
                                    	<option <?php if($cat_ids==$cat_id){echo 'selected="selected"';} ?>value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
                                       <?php  }
										?>
                                    </select>
                                
                                   <p><label>Upload Book</label>

                             <input type="file" name="upload" class="text-long" value="" /></p>
                             
                             
                             
                             
                             <!--thumbnail to upload-->
                           <p><label>Upload Thumbnail</label>
                             <input type="file" name="iamge1" class="text-long" value="" /></p>
                             
                             
                             
                             
                             
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

