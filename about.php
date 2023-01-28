	
	
	
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
	
	<section class="about">
 <center><p style="font-size:40px;color:blue;
    padding:1rem;
    margin:2rem 0;
    background:rgba(255, 51, 153,.05);"> About Us</p></center>
    <div class="flex">

        <div class="image">
            <img src="images/about2.jpg" alt="">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>Beautiful Flowers And less Price</p>
         
        </div>

    </div>
</section>

</section>>