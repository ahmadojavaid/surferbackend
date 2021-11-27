<?php 
    session_start();
 
	//local db 
	
	if($_SERVER['HTTP_HOST']=="localhost")
	{
	$serverIp="localhost";
	$userName="takeaway_appuser";
	$password='-8xGM%o{oB15';
	$dbname="takeaway_app_services";
	
	}else
	{
	//Live
	 
	$serverIp="localhost";
	$userName="takeaway_appuser";
	$password='-8xGM%o{oB15';
	$dbname="takeaway_app_services";
	}
	$cn=@mysqli_connect($serverIp,$userName,$password) OR Die("Couldn't Connect - ".mysqli_error());
	$link=mysqli_select_db($cn,$dbname)or Die("Couldn't SELCECT - ".mysqli_error()); 
	

?> 
	 
 