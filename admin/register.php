<?php
 
define('DB_HOST', 'localhost');
define('DB_NAME', 'medha_db');
define('DB_USER','root');
define('DB_PASSWORD','');
 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
 
 
function NewUser()
{
    $name = $_POST['name'];
    $contactno = $_POST['contactno'];
     $emailid = $_POST['emailid']; 
     $collegename = $_POST['collegename'];	 
	$paymentrefno = $_POST['paymentrefno'];
	$eventtype = $_POST['eventtype'];
    $groupname =  $_POST['groupname'];
	
    $query = "INSERT INTO registrations (name,contactno,emailid,collegename,paymentrefno,eventtype,groupname,isapproved) VALUES ('$name','$contactno','$emailid','$collegename','$paymentrefno','$eventtype','$groupname',0)";
    $data = mysql_query ($query)or die(mysql_error());
    if($data)
    {
		
//echo '<img src="'.$photo->reg.png.'"/>';
		//echo "<h1>YOUR REGISTRATION IS COMPLETED...</h1>";
		header('Location:success_msg.php');
		//header('Location:success_msg.php');
		exit();
    }
}
 
function SignUp()
{
if(!empty($_POST['emailid']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$emailid=$_POST['emailid'];
    $query = mysql_query("SELECT * FROM registrations WHERE emailid = '$emailid'") or die(mysql_error());
    if(!$row = mysql_fetch_array($query))
    {	 
        newuser();
    }
    else
    {
        //echo "SORRY...Email ID ALREADY REGISTERED USER...";
		header('Location:unsuccess_msg.php');
    }
}
}

  SignUp();

?>

