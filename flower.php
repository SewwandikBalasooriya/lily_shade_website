<?php

@include 'connection.php';

if(isset($_POST['add_to_cart'])){

    $product_name= $_POST['F_id'];
    $pice = $_POST['price'];
    $product_quantity = 1;

   $select_cart = mysqli_query($con, "SELECT * FROM `tblcart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($con, "INSERT INTO `tblcart`(name,price,quantity) VALUES('$product_name','$pice',' $product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

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

<?php include 'header.php'; ?>

<div class="container">

<section class="products">
<center><p style="font-size:40px;color:blue;padding:1rem;
    margin:2rem 0;
    background:rgba(255, 51, 153,.05);">Latast Flower</p></center>
 

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($con, "SELECT * FROM `tblflower`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <div class="image"><?php echo '<img src="data:Image/jpg;base64,'.base64_encode($fetch_product ['Image']).'"height="150px" width="250px"/>'; ?></div> 
			  <h3>Flower Id:<?php echo $fetch_product['Flower_Id']; ?></h3>
            <h3>Flower Name:<?php echo $fetch_product['Flower_Name']; ?></h3>
            <div class="price">RS.<?php echo $fetch_product['Price']; ?>/-</div>
            <input type="hidden" name="F_id" value="<?php echo $fetch_product['Flower_Name']; ?>">
        <input type="hidden" name="price" value="<?php echo $fetch_product['Price']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<!-- custom js file link  -->


</body>
</html>