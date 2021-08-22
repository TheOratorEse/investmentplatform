<?php

require_once("session.php");

require_once("class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Backoffice | Legacy Capital</title>
    <base />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="assets/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="assets/node_modules/jquery-ui-dist/jquery-ui.min.css" rel="stylesheet">
    <link href="assets/css/account.css" rel="stylesheet">
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'ceab9cb76d6eeb141b5b6a76e457c396ceb0b95f';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
</head>

<body class="account">
<script async data-id="60084" src="https://cdn.widgetwhats.com/script.min.js"></script>

    <main class="container">
        <h1 class="section-title">Your Backoffice</h1>
        <div class="border row position-relative">
            <button class="sidebar-toggler"><span class="navbar-toggler-icon"></span><span class="navbar-toggler-icon"></span><span class="navbar-toggler-icon"></span></button>
            <aside class="sidebar col-lg-3 col-md-4 col-sm-6">
                <div class="user"><img src="https://www.gravatar.com/avatar/527224e99bdb78a9286b4a4f24d03f18?s=100"></div>
                <p class="name"><?php echo $userRow['full_name']; ?></p>
                <hr><a href="/?a=home"><b>Home</b></a>
                <ul class="menu">
                    <li>
                        <a href="Account.php" ><img src="assets/img/menu-1.png" alt="">Account</a>
                    </li>
                    <li>
                        <a href="deposit_list.php" class="active"><img src="assets/img/menu-2.png" alt="">Deposits</a>
                    </li>
                    <li>
                        <a href="deposit.php" ><img src="assets/img/menu-3.png" alt="">Create deposit</a>
                    </li>
                    <li>
                        <a href="withdraw.php" ><img src="assets/img/menu-4.png" alt="">Withdraw</a>
                    </li>
                    <li>
                        <a href="/earnings.php" ><img src="assets/img/tasks.png" alt="">History</a>
                    </li>
                    <li>
                        <a href="referals.php" ><img src="assets/img/menu-5.png" alt="">Partners</a>
                    </li>
                    <li>
                        <a href="/edit_account.php" ><img src="assets/img/menu-6.png" alt="">Account settings</a>
                    </li>
                    <li>
                        <a href="/logout.php"><img src="assets/img/menu-8.png" alt="">Exit</a>
                    </li>
                </ul>
                <hr>
                <footer class="footer">
                    <div class="social">
                            <a href="https://t.me/joinchat/AAAAAEQiPTNVXrFHECGlug" target="_blank"><img src="assets/img/telegram.png" alt=""></a>
                        </div><a href="/?a=rules" class="terms">Privacy Policy </a>
                    <p class="copyright">&copy; All rights reserved 2019</p>
                </footer>
            </aside>
            <div class="content col-lg-9">
                <header class="header">
                    <div class="balance mb-3 mb-sm-0"><img src="assets/img/calc-logo.png" alt=""><span>BALANCE:<br>Your balance is <b><?php echo $userRow['account_bal']; ?></b> <small>USD</small></span></div>
                   
                </header>




<script language=javascript>
function IsNumeric(sText) {
  var ValidChars = "0123456789.";
  var IsNumber=true;
  var Char;
  if (sText == '') return false;
  for (i = 0; i < sText.length && IsNumber == true; i++) { 
    Char = sText.charAt(i); 
    if (ValidChars.indexOf(Char) == -1) {
      IsNumber = false;
    }
  }
  return IsNumber;
}

function checkform() {
  if (document.editform.fullname.value == '') {
    alert("Please type your full name!");
    document.editform.fullname.focus();
    return false;
  }


  if (document.editform.password.value != document.editform.password2.value) {
    alert("Please check your password!");
    document.editform.fullname.focus();
    return false;
  }




  if (document.editform.email.value == '') {
    alert("Please enter your e-mail address!");
    document.editform.email.focus();
    return false;
  }



  for (i in document.editform.elements) {
    f = document.editform.elements[i];
    if (f.name && f.name.match(/^pay_account/)) {
      if (f.value == '') continue;
      var notice = f.getAttribute('data-validate-notice');
      var invalid = 0;
      if (f.getAttribute('data-validate') == 'regexp') {
        var re = new RegExp(f.getAttribute('data-validate-regexp'));
        if (!f.value.match(re)) {
          invalid = 1;
        }
      } else if (f.getAttribute('data-validate') == 'email') {
        var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
        if (!f.value.match(re)) {
          invalid = 1;
        }
      }
      if (invalid) {
        alert('Invalid account format. Expected '+notice);
        f.focus();
        return false;
      }
    }
  }

  return true;
}
</script>



<b class="page-title mt-4 mb-2">Personal Information:</b>
<form action='' method=post onsubmit='return checkform()' name=editform><input type="hidden" name="form_id" value="15987466358636"><input type="hidden" name="form_token" value="2a8ad6412a11aae83f335c00718f125a"><input type=hidden name=a value=edit_account><input type=hidden name=action value=edit_account><input type=hidden name=say value=''>
    <div class="col-md-6 mb-3">
        <label class="input" for="exampleSelectGender"> Full Name
            <input type="text" name=fullname id="exampleInputPassword4" value='<?php echo $userRow['full_name']; ?>'>
        </label>
    </div>
    <div class="col-md-6 mb-3 mb-md-0">
        <label class="input" for="exampleInputPassword4">Email Address
            <input type="email" name=email id="exampleInputPassword4"  value='<?php echo $userRow['email']; ?>'>
        </label>
    </div><br>
    <div class="col-md-6 mb-3 mb-md-0">
        <label class="input" for="exampleInputUsername1">Date Registered
            <input type="text" class="form-control" name=password id="account/change_pass_frm_Pass0" value='<?php echo $userRow['account_date']; ?>'>
        </label>
    </div><br>
    <div class="col-md-6 mb-3 mb-md-0">
        
        </label>
    </div><b class="page-title mb-2">Wallets</b>
    <table class="personal-systems mb-2">
        <thead>
            <tr>
                <th>Payment system</th>
                <th>Account</th>
            </tr>
        </thead>
                 						<tr>
							<td>
								Your Bitcoin Payment Wallet:
							</td>
							<td>
								<input type=text class=inpts name="pay_account[1000][Payment Wallet]" value="<?php echo $userRow['btc_address']; ?>">							</td>
						</tr>
						   						<tr>
							<td>
								Your Ethereum Payment Wallet:
							</td>
							<td>
								<input type=text class=inpts name="pay_account[1006][Payment Wallet]" value="">							</td>
						</tr>
						   						<tr>
							<td>
								Your Litecoin Payment Wallet:
							</td>
							<td>
								<input type=text class=inpts name="pay_account[1007][Payment Wallet]" value="">							</td>
						</tr>
						   						<tr>
							<td>
								Your Perfect Money Payment Wallet:
							</td>
							<td>
								<input type=text class=inpts name="pay_account[1008][Payment Wallet]" value="">							</td>
						</tr>
						   						<tr>
							<td>
								Your Payeer Payment Wallet:
							</td>
							<td>
								<input type=text class=inpts name="pay_account[1009][Payment Wallet]" value="">							</td>
						</tr>
						          
    </table>
    
</form>
</div>
</div>
</main>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="assets/node_modules/select2/dist/js/select2.min.js"></script>
    <script src="assets/node_modules/jquery-ui-dist/jquery-ui.min.js"></script>
    <script src="assets/node_modules/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    <script src="assets/node_modules/jquery-countdown/dist/jquery.countdown.js"></script>
    <script src="assets/js/account.js"></script>
</body>


</html>

