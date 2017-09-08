<?php 
require 'connect.php';
require 'session.php';
if(!check())
	{
		require 'login.php';
	}
	else
	{
		
		require 'welcome.php';
	}

?>