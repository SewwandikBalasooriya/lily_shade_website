 <?php
if (isset($_POST['log']))
{
	$msg="";
	$name=$_POST['un'];
	$pass=$_POST['pw'];
	
	   $con=new mysqli("localhost","library_user","123","flower_db");
	   $sql_fetch="SELECT * FROM tbllogin WHERE Username='$name' AND Password='$pass'";
	   $result=$con->query($sql_fetch);
	   
	   while($row=$result->fetch_assoc()){
	   $name=$row['Username'];
	   $pass=$row['Password'];
	   
	   }
	  if($result->num_rows>0) {
		  
		  
		  session_start();
		  $_SESSION['user']= $name;
		  
	   header("location:admin.php");
	  }
	  else{
		 $msg="<center><p>User Name Or Password Incorrect!</p></center>" ;
		  
	  } 
} 
	   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

</head>
<body>

		<div id="log" style="float:center;width:50%;width:600px;height:500px;margin:10% auto;border-radius:25px;background-color:pink;box-shadow:0 0 17px;">
			<center>
			<form action="" method="post">
		
			<table>
	<p style="font-size:40px;color:blue; padding:1rem;
    margin:2rem 0;
    background:rgba(255, 51, 153,.05);">Admin Login</p>
				<tr style="font-size:30px;">
					<td>User Name:</td>
					<td><input type="text" name="un" style="width:350px;height:40px;margin:7% auto;border-radius:7px;background-colo:rgba(0,0,10,0,1);"/></td>
				</tr>
				
				<tr style="font-size:30px;">
					<td>Password:</td>
					<td><input type="password" name="pw" style="width:350px;height:40px;margin:7% auto;border-radius:7px;background-colo:rgba(0,0,10,0,1);"/></td>
				</tr>
				<tr style="font-size:30px;">
				<td colspan="2"><input type="submit" name="log" value="Login" style="width:500px;height:40px;brder:none;outline:none;padding-left:10px;box-sizing:border-box;font-size:15px;colr:#333;margin-bottom:40px;box-shadow:2px 2px 5px #555;text-align:center;background-color:#83acf1;fnt-weight:bold;float:center;"/></br>
				 <center> <a href="home.php" class="btn" style="width:1000px;height:" >Cancel</a></center></td>
				</tr>
		 </table>
		 </form>
		 </center>
		 <?php
		 if(isset($_POST['log'])){
			echo $msg; 
			  }
			  ?>
		 </div>
		
	</body>
</html>	
		

	
		