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


<script language="javascript"><!--
function openCalculator(id)
{

  w = 225; h = 400;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open('?a=calendar&type=' + id, 'calculator' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=0");


  
  for (i = 0; i < document.spendform.h_id.length; i++)
  {
    if (document.spendform.h_id[i].value == id)
    {
      document.spendform.h_id[i].checked = true;
    }
  }

  

}

function updateCompound() {
  var id = 0;
  var tt = document.spendform.h_id.type;
  if (tt && tt.toLowerCase() == 'hidden') {
    id = document.spendform.h_id.value;
  } else {
    for (i = 0; i < document.spendform.h_id.length; i++) {
      if (document.spendform.h_id[i].checked) {
        id = document.spendform.h_id[i].value;
      }
    }
  }

  var cpObj = document.getElementById('compound_percents');
  if (cpObj) {
    while (cpObj.options.length != 0) {
      cpObj.options[0] = null;
    }
  }

  if (cps[id] && cps[id].length > 0) {
    document.getElementById('coumpond_block').style.display = '';

    for (i in cps[id]) {
      cpObj.options[cpObj.options.length] = new Option(cps[id][i]);
    }
  } else {
    document.getElementById('coumpond_block').style.display = 'none';
  }
}
var cps = {};
--></script>


<b class="page-title">Select payment method:</b>



<form method=post name='spendform'><input type="hidden" name="form_id" value="15987462554812"><input type="hidden" name="form_token" value="b6e7fee767f3389434c1d91b66330022"><input type=hidden name=a value=deposit>
    <fieldset>
        <table class="formatTable">
            <input name="Oper" id="add_Oper" value="CASHIN" type="hidden">
            <tr>
                <td colspan="2" align="center">

                    <div class="systems row">

                        <div class="col-md-4 col-sm-6">

                            <div class="system-label">

                                <input type="radio" id="pidw1000" name=type value="process_1000" class="ack">

                                <label for="pidw1000" class="system border">

                                    <img src="/images/1000.png" alt="">

                                    <span class="type"></span>

                                    <span class="name">Bitcoin Wallet</span>

                                    <span class="ok"></span>
        

                                </label>

                            </div>

                        </div>

                        
            <tr>
                <td colspan="2" align="center"><b class="page-title">Enter the amount of the deposit:</b>
                    <div class="d-flex justify-content-between flex-column flex-md-row">
                        <div>
                            <p class="d-flex align-items-center mb-3"><img src="assets/img/calc-logo.png" alt="" class="mr-3"><span class="bax">Deposit Amount: </span><span class="gram" style="display: none">Deposit will be created with the balance: 0.00 USD</span></p>
                            <label for="enterPassword" class="input input-dolar mb-4" id="label_sum">
                                <input type="text" name=amount id="add_Sum" class="border" value=''>
                            </label>
                        </div>
                        
                    </div>
                </td>
        
             </div>

                                </label>

                            </div>

                        </div>                        
                        

                    </div>

                </td>
            </tr>

            
            <tr>
                <td colspan="2" align="center">
                    <b class="page-title">Select investment plan:</b>

                    <div class="contracts row justify-content-around">

                        <div class="col-md-4 col-sm-8">
                            <input type="radio" id="contract-1" name="h_id" value="2" hidden="">

                            <label for="contract-1" class="contract"><span class="title">Legacy Basic</span><span class="upper">Deposit period:</span>

                                <span class="text">7 Days</span><span class="upper">Accrual percentage:</span><span class="text">1.1%  Daily</span>

                                <span class="upper">deposit amount:</span><span class="text">$200.00</span>
                                <br><span class="text">Initial deposit refunded at <br>the end of the term
                                <br></br><a href="Plan_1.php"> DEPOSIT NOW  </a>

                            </span>
                            
                                <span class="ok"></span></label>
                                
                        </div>
                        <div class="col-md-4 col-sm-8">
                            <input type="radio" id="contract-2" name="h_id" value="4" hidden="">

                            <label for="contract-2" class="contract"><span class="title">Legacy Classic</span><span class="upper">Deposit period:

                    </span>

                                <span class="text">7 Days</span><span class="upper">accrual percentage:</span><span class="text">1.3% Daily</span>

                                <span class="upper">Deposit amount:</span><span class="text">$600.00</span>

                                <br><span class="text">Initial deposit refunded at <br>the end of the term
                                <br></br><a href="Plan_2.php"> DEPOSIT NOW  </a>

                            </span><span class="ok"></span></label>

                        </div>

                        <div class="col-md-4 col-sm-8">
                            <input type="radio" id="contract-3" name="h_id" value="6" hidden="">

                            <label for="contract-3" class="contract"><span class="title">Legacy Expert</span><span class="upper">Deposit period:</span>

                                <span class="text">15 Days</span><span class="upper">Accrual percentage:</span>

                                <span class="text">1.7% Daily</span>

                                <span class="upper">Deposit amount:</span><span class="text">$3000.00</span>

                                <br><span class="text">Initial deposit refunded at <br>the end of the term
                                <br></br><a href="Plan_3.php"> DEPOSIT NOW  </a>

                            </span><span class="ok"></span></label>

                        </div>
                        <div class="col-md-4 col-sm-8">
                            <input type="radio" id="contract-4" name="h_id" value="7" hidden="">

                            <label for="contract-4" class="contract"><span class="title">Legacy Investor</span><span class="upper">Deposit period:</span>

                                <span class="text">30 Days</span><span class="upper">Accrual percentage:</span><span class="text">2.0% Daily</span>

                                <span class="upper">deposit amount:</span><span class="text">$6000.00</span>

                                <br><span class="text">Initial deposit refunded at <br>the end of the term
                                <br></br><a href="Plan_4.php"> DEPOSIT NOW  </a>

                            </span>

                                <span class="ok"></span></label>
                        </div>

                        <div class="col-md-4 col-sm-8">
                            <input type="radio" id="contract-5" name="h_id" value="8" hidden="">

                            <label for="contract-5" class="contract"><span class="title">Legacy Leader</span><span class="upper">Deposit period:

                    </span>

                                <span class="text">30 Days</span><span class="upper">accrual percentage:</span><span class="text">2.3% Daily</span>

                                <span class="upper">Deposit amount:</span><span class="text">$12000.00</span>

                                <br><span class="text">Initial deposit refunded at <br>the end of the term
                                <br></br><a href="Plan_5.php"> DEPOSIT NOW  </a>

                            </span><span class="ok"></span></label>

                        </div>

                        <div class="col-md-4 col-sm-8">
                            <input type="radio" id="contract-6" name="h_id" value="9" hidden="">

                            <label for="contract-6" class="contract"><span class="title">Legacy Prime</span><span class="upper">Deposit period:</span>

                                <span class="text">30 Days</span><span class="upper">Accrual percentage:</span>

                                <span class="text">2.5% Daily</span>

                                <span class="upper">Deposit amount:</span><span class="text">$30000.00</span>

                                <br><span class="text">Initial deposit refunded at <br>the end of the term
                                <br></br><a href="Plan_6.php"> DEPOSIT NOW  </a>

                            </span><span class="ok"></span></label>

                        </div>
                        <div class="col-md-4 col-sm-8">
                            <input type="radio" id="contract-7" name="h_id" value="11" hidden="">

                            <label for="contract-7" class="contract"><span class="title">New Year Promo Plan</span><span class="upper">Deposit period:</span>

                                <span class="text">30 Days</span><span class="upper">Accrual percentage:</span>

                                <span class="text">5% Daily</span>

                                <span class="upper">Deposit amount:</span><span class="text">$30000.00</span>

                                <br><span class="text">Initial deposit refunded at <br>the end of the term
                                <br></br><a href="Plan_7.php"> DEPOSIT NOW  </a>

                            </span><span class="ok"></span></label>

                        </div>
                        <div class="col-md-4 col-sm-8">
                            <input type="radio" id="contract-8" name="h_id" value="12" hidden="">

                            <label for="contract-8" class="contract"><span class="title">Crude Oil Plan</span><span class="upper">Deposit period:</span>

                                <span class="text">90 Days</span><span class="upper">Accrual percentage:</span>

                                <span class="text">10% Daily</span>

                                <span class="upper">Deposit amount:</span><span class="text">$100000.00</span>

                                <br><span class="text">Initial deposit refunded at <br>the end of the term
                                <br></br><a href="Plan_8.php"> DEPOSIT NOW  </a>

                            </span><span class="ok"></span></label>

                        </div>

                    </div>

                </td>
            </tr>

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

