
<?php
include('conn.php');
$name =  $email = $mobile = $password='';//var
$errors = array('name' => '','email' => '', 'mobile' => '','password' => '');
if(isset($_POST['submit']))
{

	if(empty($_POST['name'])){
		$errors['name'] = '  Full Name is required <br />';
	}
	if(empty($_POST['email'])){
		$errors['email'] = '  E-mail id is required <br />';
	}
	if(empty($_POST['mobile'])){
    $errors['mobile'] = 'Mobile# is required <br />';
  }

	if(empty($_POST['password'])){
    $errors['password'] = 'A password is required <br />';
  }
	if(array_filter($errors))
  {
			echo "terminted";
		}
		else{

			$name =  	mysqli_real_escape_string($conn,$_POST['name']);
			$email =  	mysqli_real_escape_string($conn,$_POST['email']);
			$mobile =  	mysqli_real_escape_string($conn,$_POST['mobile']);
			$password = 	mysqli_real_escape_string($conn,$_POST['password']);

			$sql = "INSERT INTO admin(name,email,mobile,password) VALUES('$name','$email','$mobile','$password')";
			echo "Registration Succesful";
			if(mysqli_query($conn, $sql)){
			header('Location:alogin.php');
			echo "Login Succesful";
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}
}
	?>
<html>
<head>
<title>Registration Form</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<style>
	body{
margin: 0;
padding: 0;
background-image:url(img/register.jpg);
background-size:cover;
background-posititon:center;
font-family:sans-serif;
}
ul{
  margin:1px;
  padding:1px;
  list-style:none;
}
ul li{
  float:left;
  width:300px;
  height:40px;
    background-color:black;
    opacity:.8;
    line-height:40px;
    text-align:center;
    float-size:10px;
    margin-right:20px;
    margin-left: 20px;
}

  ul li a{

    text-decoration-color:black;
    color:darkgrey;
    display:block; 
}
ul li a:hover{
  background-color:cyan;
 text-decoration-color: black; 
}
ul li ul li{
  display:none;

}
ul li:hover ul li{
  display:block;
}
	</style>
<body>	<ul>
			<li><a href="index.php">Home</a>


           </li>

	</ul>
	<div class="loginbox" style="background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.8);">

<h1>ADMIN SIGN UP</h1>
<form action="" method="POST">
	<p>Name</p>
	<input type="text" name="name" placeholder="Enter name"required="Name is required">
	<p>E-mail</p>
	<input type="email" name="email" placeholder="Enter email"required="Email is required">
	<p>Phone Number</p>
	<input type="text" name="mobile"pattern="[0-9]{10}" placeholder="Enter phonenumber +91<10 digit>" required="">
	<p>Password</p>
	<input type="Password" name="password" placeholder="Password"required>
  <input type="submit" name="submit" value="REGISTER" style="">
	<a href="alogin.php" style="font-size: medium;">Already have an account?Sign In</a>
</form>
	</div>
</body>
</html>
