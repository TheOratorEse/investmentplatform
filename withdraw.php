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
                        <a href="/referals.php" ><img src="assets/img/menu-5.png" alt="">Partners</a>
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

<b class="page-title">YOU HAVE NO FUNDS TO WITHDRAW.</b>

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

