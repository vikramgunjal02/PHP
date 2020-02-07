<table width=100% >
<tr bgcolor=BurlyWood>
<th>Seq No</th>
<th>Name</th>
<th>Contact</th>
<th>Email id</th>
<th>College Name</th>
<th>Group Name</th>
<th>Event Type</th>
<th>Payment Ref Id</th>
<th>Reg Date</th>
<th>Status</th>
</tr>

<?php
 
define('DB_HOST', 'localhost');
define('DB_NAME', 'medha_db');
define('DB_USER','root');
define('DB_PASSWORD','');
 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
function loadentrys()
{
    $query = mysql_query("SELECT * FROM registrations where isapproved=1") or die(mysql_error());
    while($row = mysql_fetch_array($query))
    {	
		echo "<tr>";	
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['contactno']."</td>";
		echo "<td>".$row['emailid']."</td>";
		echo "<td>".$row['collegename']."</td>";
		echo "<td>".$row['groupname']."</td>";
		echo "<td>".$row['eventtype']."</td>";
		echo "<td>".$row['paymentrefno']."</td>";
		echo "<td>".$row['regdate']."</td>";
		echo "<td>".$row['isapproved']."</td>";
		echo "</tr>";
	}
  
}


  loadentrys();

?>
</table>
