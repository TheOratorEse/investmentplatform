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
<html lang="ru">


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

<div class="ref-link d-flex justify-content-between align-items-center flex-column flex-lg-row">
    <p class="mb-4 mb-lg-0"><img src="assets/img/ref.png" alt="" class="mr-2">Your referral link:</p>
    <div class="input">
        <output><a href="/?a=home" class="js-emaillink">https://legacyltdcapital.xyz//?ref=<?php echo $userRow['username']; ?> </a></output>
        <div class="social">
            <a class="js-emailcopybtn"><img src="assets/img/copy.png" alt=""></a>
        </div>
    </div>
</div>
<div class="ref-statistics d-flex justify-content-around align-items-center flex-column flex-md-row">
    <div class="line d-none d-md-block"></div>
    <p><img src="assets/img/your-ref.png" alt="" class="mr-2">Invited you: No Upline</p>
</div>

<script>
    var copyEmailBtn = document.querySelector('.js-emailcopybtn');
    copyEmailBtn.addEventListener('click', function(event) {
        var emailLink = document.querySelector('.js-emaillink');
        var range = document.createRange();
        range.selectNode(emailLink);
        window.getSelection().addRange(range);
        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copy email command was ' + msg);
        } catch (err) {
            console.log('Oops, unable to copy');
        }
        window.getSelection().removeAllRanges();
    });
</script>
<style>
    .overlay {
        display: none;
        position: fixed;
        z-index: 999;
        opacity: 0.5;
        filter: alpha(opacity=50);
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background: #000;
    }
    
    .popup {
        display: none;
        position: fixed;
        border: 3px solid #999;
        background: #fff;
        width: 394px;
        height: 194px;
        top: 50%;
        left: 50%;
        margin: -100px 0 0 -100px;
        z-index: 1000;
        border-radius: 10px;
        padding: 30px;
    }
    
    .close {
        display: block;
        width: 12px;
        text-align: center;
        cursor: pointer;
        height: 12px;
        line-height: 12px;
        background: #fff;
        color: red;
        border: 3px solid red;
        position: absolute;
        top: 10px;
        right: 10px;
        text-decoration: none;
        border-radius: 3px;
        font-size: 10px;
    }
</style>
<div class="table-overflow"><table class="referals-table"><tbody>

<tr>
  <td class=item>Referrals:</td>
  <td class=item>0</td>
</tr><tr>
  <td class=item>Active referrals:</td>
  <td class=item>0</td>
</tr><tr>
  <td class=item>Total referral commission:</td>
  <td class=item>$0.00</td>
</tr>
</tbody></table></div>
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

