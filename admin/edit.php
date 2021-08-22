<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$full_name = mysqli_real_escape_string($mysqli, $_POST['full_name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$btc_address = mysqli_real_escape_string($mysqli, $_POST['btc_address']);
	$account_bal = mysqli_real_escape_string($mysqli, $_POST['account_bal']);
	$earnings = mysqli_real_escape_string($mysqli, $_POST['earnings']);	
	$pending_withdrawal = mysqli_real_escape_string($mysqli, $_POST['pending_withdrawal']);
	$total_withdrawal = mysqli_real_escape_string($mysqli, $_POST['total_withdrawal']);
	$deposit = mysqli_real_escape_string($mysqli, $_POST['deposit']);
	// checking empty fields
	if(empty($username) || empty($password) || empty($full_name) || empty($email) || empty($btc_address) || empty($account_bal) || empty($earnings) || empty($pending_withdrawal) || empty($total_withdrawal) || empty($deposit)) {
				
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		
		if(empty($full_name)) {
			echo "<font color='red'>Full name field is empty.</font><br/>";
		}
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET username='$username',password='$password',full_name='$full_name',email='$email',btc_address='$btc_address',account_bal='$account_bal',earnings='$earnings',pending_withdrawal='$pending_withdrawal',total_withdrawal='$total_withdrawal',deposit='$deposit' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is main.php
		header("Location: main.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$username = $res['username'];
	$password = $res['password'];
	$full_name = $res['full_name'];
	$email = $res['email'];
	$btc_address = $res['btc_address'];
	$account_bal = $res['account_bal'];
	$earnings = $res['earnings'];
	$pending_withdrawal = $res['pending_withdrawal'];
	$total_withdrawal = $res['total_withdrawal'];
	$deposit = $res['deposit'];
}
?>
<html>
<head>	
	<title>Edit User Account</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<h1><a href="main.php">Home</a></h1>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $username;?>"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password" value="<?php echo $password;?>"></td>
			</tr>
			<tr> 
				<td>Full Name</td>
				<td><input type="text" name="full_name" value="<?php echo $full_name;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Btc Address</td>
				<td><input type="text" name="btc_address" value="<?php echo $btc_address;?>"></td>
			</tr>
			<tr> 
				<td>Account Balance</td>
				<td><input type="text" name="account_bal" value="<?php echo $account_bal;?>"></td>
			</tr>
			<tr> 
				<td>Earnings</td>
				<td><input type="text" name="earnings" value="<?php echo $earnings;?>"></td>
			</tr>
			<tr> 
				<td>Pending Withdrawal</td>
				<td><input type="text" name="pending_withdrawal" value="<?php echo $pending_withdrawal;?>"></td>
			</tr>
			<tr> 
				<td>Total Withdrawal</td>
				<td><input type="text" name="total_withdrawal" value="<?php echo $total_withdrawal;?>"></td>
			</tr>
			<tr> 
				<td>Deposit</td>
				<td><input type="text" name="deposit" value="<?php echo $deposit;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
