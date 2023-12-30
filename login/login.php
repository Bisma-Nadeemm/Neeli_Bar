<?php
	session_start(); 
?>
<html>
<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>
<body>



<?php
   
 
$error = "";
 $uname = "";
 
 if(isset($_REQUEST["btnSubmit"]) == true)
 {
   
   
   $uname = $_REQUEST["txtUserName"];
   
   $pswd = $_REQUEST["txtPassword"];
   
   if($uname == "admin" && $pswd == "admin")
   {$_SESSION["user"] = true;
header('Location:../Dashboard.php'); 
   }
   else {
	$_SESSION["user"] = null;
	echo "<script>alert('Invalid username or password. Please try again.');</script>";
   }
   
 }


?>


   <div class="wrapper" style="background-image: url('images/Cow2.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/cow1.jpg" alt="">
				</div>
				<form action="login.php" method="POST" >
					<h3>Login Form</h3>
					
					<div class="form-wrapper">
						<input type="text" placeholder="Username" name="txtUserName" class="form-control" required >
						<i class="zmdi zmdi-account"></i>
						</div>
					
					<div class="form-wrapper">
						<input type="password" placeholder="Password" name="txtPassword" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					
					<button name="btnSubmit" >Login
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
	

</body>
</html>