<?php
 
define('DB_HOST', 'localhost');
define('DB_NAME', 'medha_db');
define('DB_USER','root');
define('DB_PASSWORD','');
 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
 
 
function approve()
{
if(!empty($_GET['id']))   //checking the 'user' name which is from Sign-Up.html, isT it empty or have some text
{
	$id=$_GET['id'];
    //$query = mysql_query("update registrations set isapprove=1 WHERE id= '$id'") or die(mysql_error());
    if(mysql_query("update registrations set isapproved=1 WHERE id= $id"))
    {	 
       header('Location: pendingregistration.php');
		exit();
    }
    else
    {
        echo "ERROR".mysql_error();
    }
}
}
  approve();

?>

