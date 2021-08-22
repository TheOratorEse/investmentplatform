<html>
<head>
	<title>Add New User</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
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
		if(empty($btc_address)) {
			echo "<font color='red'>Btc address field is empty.</font><br/>";
		}
		if(empty($account_bal)) {
			echo "<font color='red'>Account Balance field is empty.</font><br/>";
		}
		if(empty($earnings)) {
			echo "<font color='red'>Earnings field is empty.</font><br/>";
		}
		if(empty($pending_withdrawal)) {
			echo "<font color='red'>Pending Withdrawal field is empty.</font><br/>";
		}
		if(empty($total_withdrawal)) {
			echo "<font color='red'>Total Withdrawal field is empty.</font><br/>";
		}
		if(empty($deposit)) {
			echo "<font color='red'>Deposit field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(username,password,full_name,email,btc_address,account_bal,earnings,pending_withdrawal,total_withdrawal,deposit) VALUES('$username','$password','$full_name','$email','$btc_address'account_bal,'$earnings,'$pending_withdrawal','$total_withdrawal','$deposit')");
		
		//display success message
		echo "<font color='green'>User Data added successfully.";
		echo "<br/><a href='main.php'>View Result</a>";
	}
}
?>
</body>
</html>
