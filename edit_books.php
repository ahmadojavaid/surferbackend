<?php include("includes/header.php");



	require("includes/function.php");

	//$kwallpaper=new  k_wallpaper;

	

//echo	$_REQUEST['product_id'];die;

	//Get all Level 

	//$qry="SELECT * FROM tbl_products where product_id='".$_REQUEST['product_id']."'";
 $qry="SELECT tbl_products.name,tbl_products.bookurl,tbl_products.description,tbl_products.author,tbl_products.image,tbl_category.cat_id,tbl_category.cat_name FROM tbl_products,tbl_category where tbl_category.cat_id=tbl_products.cat_id AND tbl_products.product_id='".$_REQUEST['product_id']."'";

	$result=mysql_query($qry);
	

	while($row=mysql_fetch_array($result)){
	
		//print_r($row);die;
		
		$cat_id1=$row['cat_id'];
		//$cat_name=$row['cat_name'];
		$name=$row['name'];

		$description=$row['description'];
		$author=$row['author'];
		$bookurl=$row['bookurl'];
		$image=$row['image'];

		

		}



	

	

?>
<script src="js/levels.js" type="text/javascript"></script>

<!-- h2 stays for breadcrumbs -->

<div id="main">
  <h2><a href="home.php">Dashboard</a> &raquo; <a href="#" class="active"></a></h2>
  <h3>Edit Products</h3>
  <form action="" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="actions" value="add_books"/>
    <input type="hidden" name="actions_type" value="update_book"/>
    <fieldset>
      <p>
        <label>Book Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>" class="text-long" />
      </p>
      <p>
        <label>Description:</label>
        <textarea  name="company_name" id="" value="" class="text-long"><?php echo $description; ?></textarea>
      </p>
      <p>
        <label>Author Name</label>
        <input type="text" name="author" id="" value="<?php echo $author;?>" class="text-long" />
      </p>
      <p>
        <label>Product Category</label>
        <select name="category" id="" value="" class="text-long">
          <?php  $q="SELECT * FROM tbl_category";

										$product_category=mysql_query($q);
										while($p_cat=mysql_fetch_array($product_category)){
											//print_r($p_cat);
											$cat_id2=$p_cat['cat_id'];
											$cat_name=$p_cat['cat_name'];
											?>
          <option value="<?php echo $cat_id2?>" <?php if($cat_id1==$cat_id2){echo 'selected="selected"';}?>> <?php echo $cat_name; ?></option>
          <?php  }
										?>
        </select>
      </p>
       <p>
        <label>Upload Book</label>
        <input type="file" name="upload" class="text-long" value="" />
         <?php if($bookurl!=''){?>
			<a href="<?php echo $bookurl?>" style="color:#FFF"><?php echo $name;?></a>
			<?php }else{
			}?>
       
      </p>
      <p>
        <label> Edit image</label>
        <input type="file" name="iamge1" class="text-long" value="" />
        <img src="uploads/thumbnail/<?php echo $image;?>" style=" width:47px; height:40px;"/></p>
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
