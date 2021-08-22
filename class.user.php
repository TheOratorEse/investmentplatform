<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($fullname,$username,$email,$password,$btcaddress)
	{
		try
		{
			$new_password =($password);
			
			$stmt = $this->conn->prepare("INSERT INTO users(full_name,username,email,password,btc_address) 
		                                               VALUES(:fullname, :username, :email, :password, :btcaddress)");
												  
			$stmt->bindparam(":fullname", $fullname);
			$stmt->bindparam(":username", $username);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":password", $new_password);
			$stmt->bindparam(":btcaddress", $btcaddress);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT id, username, email, password FROM users WHERE username=:uname OR email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
{
				if($upass)
							{
					$_SESSION['user_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>