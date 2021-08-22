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
                    <div class="balance mb-3 mb-sm-0"><img src="assets/img/calc-logo.png" alt=""><span>BALANCE:<br>Your balance is <b></b> <small>USD</small></span></div>
                   
                </header>



<script language=javascript>
function go(p)
{
  document.opts.page.value = p;
  document.opts.submit();
}
</script>


<table cellspacing=0 cellpadding=0 border=0 width=100%><tr>
<form method=post name=opts><input type="hidden" name="form_id" value="15991847831490"><input type="hidden" name="form_token" value="982bc768796b31f45a6a23fcc3a265d8">
<input type=hidden name=a value=history>
<input type=hidden name=page value=1>
 <td>
   <select name=type class=select2 onchange="document.opts.submit();">
<option value="">All transactions</option>
<option value="deposit" >Deposit</option>
<option value="withdrawal" >Withdrawal</option>
<option value="earning" >Earning</option>
<option value="commissions" >Referral commission</option>
   </select>
<br><img src=images/q.gif width=1 height=4><br>
   <select name=ec class=select2>
     <option value=-1>All eCurrencies</option>
 <option value=1000 >Bitcoin</option>
 <option value=1006 >Ethereum</option>
 <option value=1007 >Litecoin</option>
 <option value=1008 >Perfect Money</option>
 <option value=1009 >Payeer</option>
   </select>
 </td>
 <td align=right>
From: <select name=month_from class=select2 style="width:100px;">
<option value=1 >Jan
<option value=2 >Feb
<option value=3 >Mar
<option value=4 >Apr
<option value=5 >May
<option value=6 >Jun
<option value=7 >Jul
<option value=8 >Aug
<option value=9 selected>Sep
<option value=10 >Oct
<option value=11 >Nov
<option value=12 >Dec
</select> &nbsp;
<select name=day_from class=select2 style="width:100px;">
<option value=1 >1
<option value=2 selected>2
<option value=3 >3
<option value=4 >4
<option value=5 >5
<option value=6 >6
<option value=7 >7
<option value=8 >8
<option value=9 >9
<option value=10 >10
<option value=11 >11
<option value=12 >12
<option value=13 >13
<option value=14 >14
<option value=15 >15
<option value=16 >16
<option value=17 >17
<option value=18 >18
<option value=19 >19
<option value=20 >20
<option value=21 >21
<option value=22 >22
<option value=23 >23
<option value=24 >24
<option value=25 >25
<option value=26 >26
<option value=27 >27
<option value=28 >28
<option value=29 >29
<option value=30 >30
<option value=31 >31
</select> &nbsp;

<select name=year_from class=select2 style="width:100px;">
<option value=2015 >2015
<option value=2016 >2016
<option value=2017 >2017
<option value=2018 >2018
<option value=2019 >2019
<option value=2020 selected>2020
</select><br><img src=images/q.gif width=1 height=4><br>

To: <select name=month_to class=select2 style="width:100px;">
<option value=1 >Jan
<option value=2 >Feb
<option value=3 >Mar
<option value=4 >Apr
<option value=5 >May
<option value=6 >Jun
<option value=7 >Jul
<option value=8 >Aug
<option value=9 selected>Sep
<option value=10 >Oct
<option value=11 >Nov
<option value=12 >Dec
</select> &nbsp;
<select name=day_to class=select2 style="width:100px;">
<option value=1 >1
<option value=2 >2
<option value=3 selected>3
<option value=4 >4
<option value=5 >5
<option value=6 >6
<option value=7 >7
<option value=8 >8
<option value=9 >9
<option value=10 >10
<option value=11 >11
<option value=12 >12
<option value=13 >13
<option value=14 >14
<option value=15 >15
<option value=16 >16
<option value=17 >17
<option value=18 >18
<option value=19 >19
<option value=20 >20
<option value=21 >21
<option value=22 >22
<option value=23 >23
<option value=24 >24
<option value=25 >25
<option value=26 >26
<option value=27 >27
<option value=28 >28
<option value=29 >29
<option value=30 >30
<option value=31 >31
</select> &nbsp;

<select name=year_to class=select2 style="width:100px;">
<option value=2015 >2015
<option value=2016 >2016
<option value=2017 >2017
<option value=2018 >2018
<option value=2019 >2019
<option value=2020 selected>2020
</select>

 </td>
 <td>
	&nbsp; <input type=submit value="Go" class=sbmt>
 </td>
</tr></table>
</form>
<br><br>


<div class="table-overflow"><table class="referals-table"><tbody>
<tr>
 <th class=inheader><b>Type</b></th>
 <th class=inheader width=200><b>Amount</b></th>
 <th class=inheader width=170><b>Date</b></th>
</tr>
<tr>
 <td colspan=3 align=center>No transactions found</td>
</tr>

</tbody></table></div>

<ul class="pagination"><li class="page-item"><a class="prev page-link disabled">&lt;&lt;</a></li><li class="page-item active"><a class="page-link">1</a></li><li class="page-item"><a class="next page-link disabled">&gt;&gt;</a></li></ul>

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
