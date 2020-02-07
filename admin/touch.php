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
    
     $email = $_POST['email']; 
     
    $message =  $_POST['message'];
	
    $query = "INSERT INTO touch (name,email,message) VALUES ('$name','$email','$message')";
    $data = mysql_query ($query)or die(mysql_error());
    if($data)
    {
		header('Location:send_msg.php');
    }
}
function SignUp()
{
if(!empty($_POST['email']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$email=$_POST['email'];
    $query = mysql_query("SELECT * FROM touch WHERE email = '$email'") or die(mysql_error());
    if(!$row = mysql_fetch_array($query))
    {	 
        newuser();
    }
    else
    {
       header('Location:unsuccess_msg.php');
    }
}
}

  SignUp();

?>


 
