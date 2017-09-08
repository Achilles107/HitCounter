<?php
include 'connect.php';
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['uname'])&&isset($_POST['pass']))
{
	$fname=$_POST['fname'];
	$lname=$_POST["lname"];
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	
	if(!exists($uname))
{
	count_users();
	add($fname,$lname,$uname,$pass);
	echo "You have been registered";
}
else
{
	$red_page = 'login.php';
	echo 'You are already registered';
}
}
function exists($username)
{
	global $uname;
	$query="select username from StdReg where username='$uname'";
	$query_run=mysql_query($query);
	$run=mysql_num_rows($query_run);
	if($run==0)
	{
		return false; 
	}
	else if($run>=1)
	{
		return true;
	}
}
function add($fisrtname,$lastname,$username,$password)
{
	global $fname;
	global $lname;
	global $uname;
	global $pass;
	$query="insert into StdReg values('$fname','$lname','$uname','$pass')";
	mysql_query($query);
}
function count_users()
{
	$query="select counts from hitscount";
	$query_run=mysql_query($query);
	if($query_run)
	{
		$counts=mysql_result($query_run,'0','counts');
		$newcounts=$counts + 1;
		$query_upd="update hitscount set counts='$newcounts'";
		mysql_query($query_upd);
	}
}

?>
<html>
<head>
<title>Student Registration</title>
<style>
html {
  height: 100%;
}

body {
  background-image: url("imgtwo.jpg"); 
  color: #606468;
  font-size: 16px;
  align-items: center;
  justify-content: center;
  margin: 0;
  display: flex;
}
.form_reg
{
	background-image: url("imgtwo.jpg"); 
	width:45%;
	position;relative;
	box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
	color: #333;
	border-radius: 10px;
}
.head
{
	background:#ea4c88;
	padding:30px 30px;
	font-size: 1.2em;
	color:white;
	font-weight: 600;
	border-radius: 10px 10px 0 0;
}
.user
{
	font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 70%;
  border: 0;
  margin-left:100px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
form label
{
	 margin-left: 15px;
  display: inline-block;
  margin-top: 30px;
  color:#FFFFFF;
  margin-bottom: 5px;
  position: relative;
  font-size:20px;
}
.reg
{
	background:#ea4c88;
	position:relative;
	margin-top: 30px;
	margin-bottom: 30px;
	color: white;
	width: 65%;
	margin-left:110px;
	font-family: "Roboto", sans-serif;
	padding: 5px 15px;
  font-size: 1.5em;
  font-weight: 400;
  border-radius: 3px;
  outline: 0;
}
.reg:hover
{
	background-image: url("imgtwo.jpg");
	color:#ea4c88;
}
.names
{
	font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 25%;
  border: 0;
  margin-left:5px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.usernames
{
	 margin-left: 15px;
  display: inline-block;
  margin-top: 30px;
  color:#FFFFFF;
  margin-bottom: 5px;
  position: relative;
  font-size:20px;
}
</style>
</head>
<body>
<form action="register.php" method="POST" class="form_reg">
<header class="head">Student Registration</header><br>

<label class="usernames">First Name:</label>
<input type="text" placeholder="First Name" name="fname" class="names" required>
<label class="usernames">Last Name:</label>
<input type="text" placeholder="Last Name" name="lname" class="names" required>
<br>


<label class="userName">Username</label><br>
<input type="text" placeholder="Username"  name="uname" class="user" required>
<br>


<label class="pass">Password</label><br>
<input type="password" placeholder="Password" name="pass" class="user" required><br>
<input type="submit" value="Register" class="reg"/>
</form>
</body>
</html>
