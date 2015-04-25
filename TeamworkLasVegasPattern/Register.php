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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="Register.php";
  $loginUsername = $_POST['UserName'];
  $LoginRS__query = sprintf("SELECT Username FROM users WHERE Username=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_MyConnection, $MyConnection);
  $LoginRS=mysql_query($LoginRS__query, $MyConnection) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "RegisterForm")) {
  $insertSQL = sprintf("INSERT INTO users (Fname, Lname, Email, Username, Password) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Fname'], "text"),
                       GetSQLValueString($_POST['LName'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['UserName'], "text"),
                       GetSQLValueString($_POST['Password'], "text"));

  mysql_select_db($database_MyConnection, $MyConnection);
  $Result1 = mysql_query($insertSQL, $MyConnection) or die(mysql_error());

  $insertGoTo = "Login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_MyConnection, $MyConnection);
$query_RegisterForm = "SELECT * FROM users";
$RegisterForm = mysql_query($query_RegisterForm, $MyConnection) or die(mysql_error());
$row_RegisterForm = mysql_fetch_assoc($RegisterForm);
$totalRows_RegisterForm = mysql_num_rows($RegisterForm);
?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Index.css" rel="stylesheet" type="text/css"/>
    <title>Sign Up Form</title>
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
                    <li><a href="Forum.php">Forum</a></li>
                    <li><a href='logout_parse.php'>Logout</a>
                </ul>
            </nav>
        </div>
    	<div id="Content">
        	<div id="PageHeading">
            	<h1>Welcome to my site</h1>
            </div>
        	<div id="ContentLeft">	
        	  <h2>You message here</h2>
              <h6>Other message here</h6>
        	</div>
            <div id="ContentRight">
            	<h2>Registration Form</h2>
           	    <form action="<?php echo $editFormAction; ?>" method="POST" name="RegisterForm" id="RegisterForm">
           	    <table width="421" border="0" align="center">
                  <tr>
                    <td><table border="0">
                      <tr>
<td><p>First Name:</p>
  <span id="sprytextfield1">
                          <label for="Fname"></label>
                          <input name="Fname" type="text" class="StyleTextField" id="Fname">
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        <td><p>Last Name:</p>
                          <span id="sprytextfield2">
                          <label for="LName"></label>
                          <input name="LName" type="text" class="StyleTextField" id="LName">
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                  <td><p>Email:</p>
                    <span id="sprytextfield3">
                    <label for="Email"></label>
                    <input name="Email" type="text" class="StyleTextField" id="Email">
                    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
              <td><p>UserName:</p>
                <span id="sprytextfield4">
                      <label for="UserName"></label>
                      <input name="UserName" type="text" class="StyleTextField" id="UserName">
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><table border="0">
                      <tr>
            <td><p>Password:</p>
              <span id="sprytextfield5">
                          <label for="Password"></label>
                          <input name="Password" type="Password" class="StyleTextField" id="Password">
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        <td><p>Confirm Password</p>
                          <span id="sprytextfield6">
                          <label for="PasswordConfirm"></label>
                          <input name="PasswordConfirm" type="Password" class="StyleTextField" id="PasswordConfirm">
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><label for="RegisterButon"></label>
                    <input type="submit" name="RegisterButon" id="RegisterButon" value="Sign Up"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <input type="hidden" name="MM_insert" value="RegisterForm">
</form>
            </div>
    	</div>
    	<div id="Footer"></div>
    </div>
    <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($RegisterForm);
?>