 <?php
if (!isset($_SESSION['debug'])) {
  $_SESSION['debug'] = True;
  $_SESSION['debug'] = False;
}

include('RevCrypt.inc.php');
$crypto = new RevCrypt($_COOKIE['PHPSESSID'].$_COOKIE['PHPSESSID']);
if ($_SESSION['debug']) {print "<br>userCode: ".$_COOKIE['username']."/".$_COOKIE['password'];};
if ($_SESSION['debug']) {print "<br>userdecode: ".$crypto->decode($_COOKIE['Username']).'/'. $crypto->decode($_COOKIE['Password']);};

$conn = mysqli_connect("10.236.245.96", $crypto->decode($_COOKIE['Username']), $crypto->decode($_COOKIE['Password']), "CloudSecu") 
            or die (  
                        print "<script type='text/javascript'>document.location.replace('login.php');</script>"
                    );

include 'function.inc.php'; 
include 'template/Headeur.html'; 
?> 

