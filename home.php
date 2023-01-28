
 <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Flower Web Site</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/index2_style.css">
   <link rel="stylesheet" href="css/index_style.css">

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
<section class="home" id="home">

    <div class="content">
        <p style="font-size:40px;color:#333;" >Lily Shade Online Flower Shop</p>
        <p style="font-size:30px;color:#333;" > Natural & Beautiful Flower Plants <p>
        
        <a href="#" class="btn">Shop now</a>
    </div>
    
</section>
<section class="footer">
 <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="home.php">home</a>
            <a href="flower.php">Flowers</a>
            <a href="flower.php">Orders</a>
            <a href="about.php">About</a>
         
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="login.php">Admin Account</a>
            <a href="search.php">Search Page</a>
          
        </div>

     

        <div class="box">
            <h3>contact info</h3>
            <a href="#">0766924312</a>
            <a href="#">lilyshade21@gmail.com</a>
          
        </div>

    </div>

    <div class="credit">  all rights reserved </div>

</section>