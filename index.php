<?php
// ############################################# //
//       Anonym Script By TheTechGenius.Net      //
// Visit https://thetechgenius.net for more info //
// ############################################# //
// #     Email - admin@thetechgenius.net       # //
// ############################################# //


session_start();

/* ---- Options ---- */
        
	$second = 5;             //The time in seconds the user gets redirected

//####################

/**
  Step 1. Get the query string variable and set it in a session, then remove it from the URL.
*/
if (isset($_GET['to']) && !isset($_SESSION['to'])) {
    $_SESSION['to'] = urldecode($_GET['to']);
    header('Location: index.php');// Must be THIS script
    exit();
}


/**
  Step 2. The page has now been reloaded, replacing the original referer with  what ever this script is called.
  Make sure the session variable is set and the query string has been removed, then redirect to the intended location.
*/
if (!isset($_GET['to']) && isset($_SESSION['to'])) {
    $output = '<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/anon.css"><script src="js/timer.js"></script>
<meta name="robots" content="none"><meta http-equiv="refresh" content=" '.$second.' url='.$_SESSION['to'].'" />
<title>Anonymous Link - Redirecting...</title>
</head>
<body>

<div id="logo"><img src="img/logo/YOUR_LOGO.png"/></div><div id="box"><i>Redirecting in <b><span id="timer">'.$second.' </span></b> second(s)...</i><br /><a href="'.$_SESSION['to'].'" rel="nofollow">(Click here if your browser does not redirect.)</a><br /><br /><div class="url_box">'.$_SESSION['to'].'</div></div><meta name="robots" content="noindex,nofollow" />

</body>
</html>' . "\n";
    unset($_SESSION['to']);
    echo $output;
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/anon.css">
<meta name="robots" content="none">
<title>Referral Mask</title>
</head>
<body>
<h1>Referral Mask</h1>
<p>This resource is used to change the HTTP Referral header of a link clicked from within our secure pages.</p>
</body>
</html>
