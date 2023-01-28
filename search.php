<?php

@include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
     <link rel="stylesheet" href="css/index2_style.css">
   <link rel="stylesheet" href="css/index_style.css">

</head>
<body>
   


<section class="heading">
 <center><p style="font-size:40px;color:white;padding:1rem;
    margin:2rem 0;
   ">Search Page</p></center>
    <p> <a href="home.php">home</a> / search </p>
</section>

<section class="search-form">
    <form action="" method="POST">
        <input type="text" class="box" placeholder="Search Flower Name..." name="search_box">
        <input type="submit" class="btn" value="search" name="search_btn">
    </form>
</section>

<section class="products" style="padding-top: 0;">

   <div class="box-container">

      <?php
        if(isset($_POST['search_btn'])){
         $search_box = mysqli_real_escape_string($con, $_POST['search_box']);
         $select_products = mysqli_query($con, "SELECT * FROM `tblflower` WHERE Flower_Name LIKE '%{$search_box}%'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="POST" class="box">
	  
        <div class="image"><?php echo '<img src="data:Image/jpg;base64,'.base64_encode($fetch_products ['Image']).'"height="250px" width="200px"/>'; ?></div> 
	       <div class="name">Flower Id:<?php echo $fetch_products['Flower_Id']; ?></div>
		  <div class="name">Flower Name:<?php echo $fetch_products['Flower_Name']; ?></div>
		 <div class="price">RS:<?php echo $fetch_products['Price']; ?>/-</div>
 
  
      </form>
      <?php
         }
            }else{
                echo '<p class="empty">no result found!</p>';
            }
        }else{
            echo '<p class="empty">search something!</p>';
        }
      ?>

   </div>

</section>







<script src="js/script.js"></script>

</body>