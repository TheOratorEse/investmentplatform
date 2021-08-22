

<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('registerdone.php');
}

if(isset($_POST['btn-login']))
{
	$fullname = strip_tags($_POST['fullname']);
	$username = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $btcaddress = strip_tags($_POST['btcaddress']);
		
	if($login->register($fullname,$username,$email,$password,$btcaddress))
	{
		$login->redirect('registerdone.php');
	}
	else
	{
		$error = "Unable to Register, try again !";
	}	
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<!-- Mirrored from legacycapitalpty.org/?a=signup by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Aug 2020 14:44:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Legacy Capital</title>
    <base />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="assets/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="assets/node_modules/jquery-ui-dist/jquery-ui.min.css" rel="stylesheet">
    <link href="assets/node_modules/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/second.css" rel="stylesheet">    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="assets/node_modules/select2/dist/js/select2.min.js"></script>
    <script src="assets/node_modules/jquery-ui-dist/jquery-ui.min.js"></script>
    <script src="assets/node_modules/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    <script src="assets/node_modules/wowjs/dist/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/preloader.js"></script>
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

<body class="home">
<script async data-id="60084" src="https://cdn.widgetwhats.com/script.min.js"></script>
    <div class="background">
        <main class="main">
            <header class="header">
                <div class="container">
                    <div class="d-flex flex-column flex-md-row justify-content-around justify-content-md-between align-items-center">
                        <a href="indexbc14.html?a=home" class="logo"><img src="assets/img/logo.png" alt=""></a>
                        <div class="social">
                            <a href="https://t.me/joinchat/AAAAAEQiPTNVXrFHECGlug" target="_blank"><img src="assets/img/telegram.png" alt=""></a>
                        </div>
                        <div class="dropdown">
                            <div id="google_translate_element"></div>
                        </div>
                        <nav class="navbar navbar-expand-md">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span><span class="navbar-toggler-icon"></span><span class="navbar-toggler-icon"></span></button>
                            <div id="header" class="collapse navbar-collapse">
                                <ul class="navbar-nav align-items-center flex-column flex-sm-row">
                                    <li ><a href="indexbc14.html?a=home">Home</a></li>
                                    <li><a class="scroll-link" href="#invest">Investment plan</a></li>
                                    <li ><a href="indexe47e.html?a=about">About</a></li>
                                    <li ><a href="index38cd.html?a=faq">FAQ</a></li>
                                    <li ><a href="index15a0.html?a=support">Contact</a></li>
                                    <li ><a href="indexa972.html?a=rules">Privacy policy</a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class="login d-flex align-items-center flex-column flex-lg-row"><a href="indexcca3.php?a=signup" class="button btn-up mr-0 mr-lg-4 mb-3 mb-lg-0">Register</a><a href="indexc30b.php?a=login" class="button btn-square btn-square--blue">Login</a></div>
                    </div>
                </div>
            </header>
                    </main>
      
 

    <div class="reglog" id="sign-up">
<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Sign up</p>
                </div>
                <div class="modal-body">
                    <p class="text text-center">In order to invest in the project, you need to register. This will require only a few minutes and a minimum amount of information.</p><br>
                     
            
                    <form name="form1" method="POST" action="" class="uk-form">
                        
            <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
         </div>
         </div>
                        <div class="input">
                            <div class="icon"><img src="assets/img/login.png" alt=""></div>
                            <input class="uk-width-1-1" type="username" name="fullname" id="fullname" size="18" placeholder="Fullname" value='' required />
                        </div>
                        <div class="input">
                            <div class="icon"><img src="assets/img/login.png" alt=""></div>
                            <input class="uk-width-1-1" type="text" name="username" id="username" size="18" placeholder="Login" value='' required />
                        </div>
                        <div class="input">
                            <div class="icon"><img src="assets/img/mail.png" alt=""></div>
                            <input class="uk-width-1-1" type="text" placeholder="E-mail" name="email" id="email" size="18" value='' required />
                        </div>
                        <div class="input">
                            <div class="icon"><img src="assets/img/pass.png" alt=""></div>
                            <input class="uk-width-1-1" size="18" placeholder="Password" name="password" id="password" type="password" value='' required />
                        </div>
                        
                        <div class="input">
                            <div class="icon"><img src="assets/img/login.png" alt=""></div>
                            <input class="uk-width-1-1" type="text" name="btcaddress" id="btcaddress" size="18" placeholder="BTC wallet address" required />
                        </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn-square btn-square--blue" name="btn-login" type="submit">Sign up</button>
                        </div> 
                          <br></br>
                        <p>Already have an account? <a href="indexc30b.php">Login here</a>.</p>
                          </form>
                        <div class="modal-footer align-items-center">
                            <label class="checkbox">
                      
                            <p>By registering on the project, you fully accept the <a href="indexa972.html?a=rules">terms of this agreement.</a></p>
                        </div>
                    </form>
                    
                    
                   
                   
                </div>
            </div>
        </div>
        </div>
<footer class="footer">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="copyright">&copy; All rights reserved 2019</p><a href="mailto:contact@legacyltdcapital.xyz" class="email">contact@legacyltdcapital.xyz</a>
                <ul class="menu">
                    <li><a class="scroll-link" href="#invest">Investment plan</a></li>
                    <li><a href="indexe47e.html?a=about">About</a></li>
                    <li><a href="index38cd.html?a=faq">FAQ</a></li>
                    <li><a href="index15a0.html?a=support">Contact</a></li>
                    <li><a href="indexa972.html?a=rules">Privacy policy</a></li>
                </ul>
            </div>
        </footer>
        <div class="scroll-up"><span class="arrow"></span><span class="arrow"></span><span class="arrow"></span></div>
    </div>
    
</body>




<script>

function googleTranslateElementInit() {

new google.translate.TranslateElement({

pageLanguage: 'en'

}, 'google_translate_element');

}

</script><script src="../translate.google.com/translate_a/elementa0d8.html?cb=googleTranslateElementInit"></script>



</html>