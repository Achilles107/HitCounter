<?php
ob_start();
session_start();
$curr_file=$_SERVER['SCRIPT_NAME'];
$http_referer=@$_SERVER['HTTP_REFERER'];
function check()
{
	if(isset($_SESSION['user_id']))
	{
		return true;
	}else 
	{
		return false;
	}
}
?>