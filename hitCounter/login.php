<?php

if(isset($_POST['username'])&&isset($_POST['password']))
{
	$uname=$_POST['username'];
	$pass=$_POST['password'];
	
	$query="select username from StdReg where username='$uname' and password='$pass'";
	$query_run=mysql_query($query);
	$nor=mysql_num_rows($query_run);
	if($nor==0)
	{
		echo "Invalid username and password";
	}else if($nor==1)
	{
		$usern=mysql_result($query_run,0,'username');
		$_SESSION['user_id']=$usern;
		header('Location: loginnew.php');
	}

	
}

?>
<html>
<head>
<title>LogIn Page</title>

<style>
html, body 
{
	border: 0;
	padding: 0;
	margin: 0;
	height: 100%;
}
body
{
	background-image: url("imgfive.jpg"); 
	display: flex;
	font-size: 16px;
	align-items: center;
	justify-content: center;
}

form
{
	background-image: url("imgfive.jpg"); 
	width: 40%;
	position: relative;
	box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
	color: #333;
	border-radius: 10px;
}
form header
{
	background:#76b852;
	padding:30px 30px;
	font-size: 1.2em;
	color:white;
	font-weight: 600;
	border-radius: 10px 10px 0 0;
}
form .help
 {
  margin-left: 70px;
  font-size: 0.8em;
  color: #777;
}
form label {
  margin-left: 70px;
  display: inline-block;
  margin-top: 30px;
  margin-bottom: 5px;
  position: relative;
  font-size:20px;
}
.reg
{
	background:#4CAF50;
	position:relative;
	margin-top: 30px;
	margin-bottom: 30px;
	margin-right:120px;
	color: white;
	width: 75%;
	font-family: "Roboto", sans-serif;
	padding: 5px 15px;
  font-size: 1.3em;
  font-weight: 400;
  border-radius: 3px;
  outline: 0;
  
	
}
.reg:hover {
  background-image: url("imgfive.jpg"); 
}
form input
{
	font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 75%;
  border: 0;
  margin-left:70px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
</style>
</head>

<body>
<form method="POST" action="<?php echo $curr_file;?>">
<header>Admin Login</header>
<label>Username</label><br>
<input type="text" placeholder="Username" name="username" required>
<div class="help">At least 6 characters</div>
<label>Password</label><br>
<input type="password" placeholder="Password" name="password" required>
<input type="submit" value="Login" class="reg"/>
</form>
</body>
</html>