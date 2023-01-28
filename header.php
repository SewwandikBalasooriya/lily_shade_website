 <?php
@include 'connection.php';
?>
 
 
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

<header class="header">

   <div class="flex">

      <a href="" class="logo"><span>Flowers</span></a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="flower.php">Flowrs</a>
         <a href="cart.php">Orders</a>
		  <a href="about.php">About us</a>

      </nav>

    <div class="icons">
	

            <div id="user-btn"><a href="search.php" class="fas fa-search"></a>
			
            <a href="login.php" class="fas fa-user" id="user-btn"></a>
			  <?php
      
      $select_rows = mysqli_query($con, "SELECT * FROM `tblcart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="fas fa-shopping-cart" id="user-btn"><span><?php echo $row_count; ?></span> </a>
  
   
   <a href="menu.php" class="fas fa-bars" id="menu-btn"></a>

   </div>

	</div>



</header>