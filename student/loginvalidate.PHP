<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	$login=$_SERVER['HTTP_REFERER'];
	
	if((!$username) or (!$password))
	{
	header("Location:$login");
	exit();
	}
	$conn=@mysql_connect("localhost","root","") or die("Cannot Connect");
	$rs=@mysql_select_db("medha_db",$conn) or die("DB ERROR");
	$sql="select * from authentication where userName=\"$username\" and password=\"$password\" and isblocked=0";
	$rs=mysql_query($sql,$conn) or die ("Could not execte");
	$rows=mysql_numrows($rs);
	if($rows!=0)
	{
	//echo("<h2> $username ok welcome </h2>");
		header('Location: home.php');
		exit();
	}
	else
	{
	header("Location:$login");
	exit();
	}
	
?>