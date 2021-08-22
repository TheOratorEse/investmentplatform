<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>		
<title>Admin Panel Dashboard</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<H2>Welcome to Admin Panel</H2>


<h3><p><a href="add.html">Creat New User</a> <form method='post' action="logout.php"></p></h5>
            <div id=""> <input type="submit" value="Logout" name="but_logout">
		</form><br/>
	


	<table width='90%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Username</td>
		<td>Password</td>
		<td>Names</td>
		<td>Email</td>
		<td>Btc address</td>
		<td>Alc Balance</td>
		<td>Earnings</td>
		<td>Pending Withdrawal</td>
		<td>Total Withdrawal</td>
		<td>Deposited</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['username']."</td>";
		echo "<td>".$res['password']."</td>";
		echo "<td>".$res['full_name']."</td>";
		echo "<td>".$res['email']."</td>";
		echo "<td>".$res['btc_address']."</td>";
		echo "<td>".$res['account_bal']."</td>";
		echo "<td>".$res['earnings']."</td>";
		echo "<td>".$res['pending_withdrawal']."</td>";
		echo "<td>".$res['total_withdrawal']."</td>";
		echo "<td>".$res['deposit']."</td>";
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	
</body>
</html>
