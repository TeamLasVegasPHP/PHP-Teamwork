<?php require_once('../../Connections/MyConnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_MyConnection, $MyConnection);
$query_Login = "SELECT * FROM users";
$Login = mysql_query($query_Login, $MyConnection) or die(mysql_error());
$row_Login = mysql_fetch_assoc($Login);
$totalRows_Login = mysql_num_rows($Login);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['UserName'])) {
  $loginUsername=$_POST['UserName'];
  $password=$_POST['Password'];
  $MM_fldUserAuthorization = "UserLevel";
  $MM_redirectLoginSuccess = "Account.php";
  $MM_redirectLoginFailed = "Login.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_MyConnection, $MyConnection);
  	
  $LoginRS__query=sprintf("SELECT Username, Password, UserLevel FROM users WHERE Username=%s AND Password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $MyConnection) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'UserLevel');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?php
@session_start(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Index.css" rel="stylesheet" type="text/css"/>
    <title>Log In</title>
    <script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="Holder">
    	<div id="Header">
            <img id="HeaderLeftImage" src="images/logo.png"></img>
            <img id="HeaderRightImage" src="images/logo.png"></img>
            <p id="LogoText">Welcome To</p>
            <p id="LogoText">Las Vegas</p>
        </div>
    	<div id="NavBar">
        	<nav>
            	<ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Login.php">Log In</a></li>
                    <li><a href="Register.php">Sign Up</a></li>
                    <li><a href="ForgotPassword.php">Forgot Password</a></li>
                    <li><a href="Account.php">Account</a></li>
                    <li><a href='logout_parse.php'>Logout</a>
                </ul>
            </nav>
        </div>
    	<div id="Content">
        	<div id="PageHeading">
            	<h1>Welcome to my site</h1>
            </div>
        	<div id="ContentLeft">
                <h6>Other message here</h6>
        	</div>
            <div id="ContentRight">
              <form action="<?php echo $loginFormAction; ?>" method="POST" name="LoginForm" id="LoginForm">
                <table width="400" border="0" align="center">
                  <tr>
                    <td><h3>UserName:</h3>
<p><span id="sprytextfield3">
                        <label for="UserName"></label>
                        <input name="UserName" type="text" class="StyleTextField" id="UserName">
                    <span class="textfieldRequiredMsg">A value is required.</span></span></p></td>
                  </tr>
                  <tr>
                    <td><h3>Password:</h3>
<p><span id="sprytextfield4">
                        <label for="Password"></label>
                        <input name="Password" type="Password" class="StyleTextField" id="Password">
                    <span class="textfieldRequiredMsg">A value is required.</span></span></p></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><label for="LoginButton"></label>
                    <input type="submit" name="LoginButton" id="LoginButton" value="LogIn"></td>
                  </tr>
                </table>
              </form>
          </div>
        </div>
    	<div id="Footer"></div>
    </div>
    <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($Login);
?>
