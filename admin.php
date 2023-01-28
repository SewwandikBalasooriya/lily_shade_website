<?php

@include 'connection.php'; 

if(isset($_POST['add_product'])){
   $f_id = $_POST['flowerId'];
   $f_name = $_POST['flowerName'];
   $f_color = $_POST['fcolor'];
  $image=addslashes (file_get_contents($_FILES["fimage"]["tmp_name"]));
   $f_prize = $_POST['fprize'];
   
      $insert_query = mysqli_query($con, "INSERT INTO tblflower VALUES('$f_id', '$f_name','$f_color', '$image',' $f_prize')") or die('query failed');
	  
	
   if($insert_query){
     $message[] = 'Flowers Add succesfully!';
   }else{
      $message[] = 'Could Not Add the Flowers!';
   }
}


  if((isset($_GET['delete'])==true) && 
  (isset($_GET['delete'])<>null))
{
	$Flower_Id=$_GET['delete'];
	$sql_delete="DELETE FROM tblflower WHERE Flower_Id='$Flower_Id'";
	$result=mysqli_query($con,$sql_delete);
	 if($result){
     $message[] = 'Flowers Delete Succesfully!';
   }else{
      $message[] = 'Could Not Delete the Flowers!';
   }
};
if(isset($_POST['update_product'])){
	 $fid = $_POST['update_f_id'];
   $fname = $_POST['update_f_name'];
   $fcolor = $_POST['update_color'];
  $fimage=addslashes (file_get_contents($_FILES["update_f_image"]["tmp_name"]));
   $fprize = $_POST['update_price'];
  

   $update_query = mysqli_query($con, "UPDATE tblflower SET Flower_Name = '$fname', Color = '$fcolor', Image = '$fimage',  Price='$fprize'  WHERE Flower_Id = '$fid'");

   if($update_query){
 
      $message[] = 'Flowers updated succesfully!';
   
   }else{
      $message[] = 'Flowers could not be updated!';
 
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/adminp_style.css">

</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<section>
<header class="header">

   <div class="flex">

      <a href="#" class="logo">Admin Panel</a>

      <nav class="navbar">
         <a href="home.php">Logout</a>
       
      </nav>

    

   

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>
</section>
<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Add a new Flowers</h3>
   <input type="text" name="flowerId" placeholder="enter the product id" class="box" required>
   <input type="text" name="flowerName" placeholder="enter the product name" class="box" required>
   <input type="text" name="fcolor" placeholder="enter the product color" class="box" required>
   <input type="file" name="fimage"  class="box" required>
    <input type="text" name="fprize" placeholder="enter the product price" class="box" required>
   <input type="submit" value="Add The Flowers" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
          <th>Flowers image</th>
		  <th>Flowers Id</th>
		  <th>Flowers Name</th>
		 <th>Color</th>
		
         <th> price</th>
         
		 
      </thead>

      <tbody>
     <?php
         
         $select_products = mysqli_query($con, "SELECT * FROM `tblflower`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

				
		
      
           <tr>
		  <td> <?php echo '<img src="data:images/jpg;base64,'.base64_encode($row['Image']).'"height="100px" width="100px"/>'; ?></td>
          <td><?php echo $row['Flower_Id']; ?></td>
			<td><?php echo $row['Flower_Name']; ?></td>
			<td><?php echo $row['Color']; ?></td>
            <td>Rs.<?php echo $row['Price']; ?>/-</td>
			<td><a href="admin.php?delete=<?php echo $row['Flower_Id'] ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');">Delete</a>
			<a href="admin.php?edit=<?php echo $row['Flower_Id'] ?>" class="delete-btn">Edit</a></td>
 </tr>
 <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
     </tbody> 
</table>	 
</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit']))
{
	$flowerid =$_GET['edit'];
$sql_select="SELECT * FROM tblflower WHERE Flower_Id='$flowerid'";
	$result=mysqli_query($con,$sql_select);
	
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
   ?>

   <form action="" method="post" enctype="multipart/form-data">
    <?php echo '<img src="data:images/jpg;base64,'.base64_encode($row['Image']).'"height="100px" width="100px"/>'; ?>
    <input type="text" class="box" required name="update_f_id" value="<?php echo $row['Flower_Id']; ?>">
      <input type="text" class="box" required name="update_f_name" value="<?php echo $row['Flower_Name']; ?>">
      <input type="text"  class="box" required name="update_color" value="<?php echo $row['Color']; ?>">
	   <input type="text"  class="box" required name="update_price" value="<?php echo $row['Price']; ?>">
      <input type="file" class="box" name="update_f_image" >
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <center> <a href="admin.php" class="btn" style="width:460px;height:" >Cancel</a></center>
   </form>
 

   <?php
            };
         };
		 
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
   };
        ?>

</section>

</div>
<!-- custom js file link  -->
<script src="js/admin_script.js"></script>
	 </body>
   
</html>