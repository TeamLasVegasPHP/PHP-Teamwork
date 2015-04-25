<?php @session_start(); ?>
<?php require_once('Connections/MyConnection.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateForm")) {
  $updateSQL = sprintf("UPDATE users SET Email=%s, Password=%s WHERE UserID=%s",
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_POST['UserIDHiddenField'], "int"));

  mysql_select_db($database_MyConnection, $MyConnection);
  $Result1 = mysql_query($updateSQL, $MyConnection) or die(mysql_error());

  $updateGoTo = "Account.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_User = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_User = $_SESSION['MM_Username'];
}
mysql_select_db($database_MyConnection, $MyConnection);
$query_User = sprintf("SELECT * FROM users WHERE Username = %s", GetSQLValueString($colname_User, "text"));
$User = mysql_query($query_User, $MyConnection) or die(mysql_error());
$row_User = mysql_fetch_assoc($User);
$totalRows_User = mysql_num_rows($User);
?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Index.css" rel="stylesheet" type="text/css"/>
    <title>Account Update</title>
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
                    <li><a href="Forum.php">Forum</a></li>
                    <li><a href="Account.php">Account</a></li>
                    <li><a href='logout_parse.php'>Logout</a>
              </ul>
            </nav>
        </div>
    	<div id="Content">
        	<div id="PageHeading">
            	<h1>Update Account</h1>
            </div>
        	<div id="ContentLeft">	
        	  <h2>Account Links</h2>
              <h6>Other message here</h6>
        	</div>
            <div id="ContentRight">
              <form action="<?php echo $editFormAction; ?>" method="POST" name="UpdateForm" id="UpdateForm">
                <table width="600" border="0">
                  <tr>
                    <td align="center"><h3>Name: <?php echo $row_User['Fname']; ?> <?php echo $row_User['Lname']; ?></h3>
                      <h3>Username:  <?php echo $row_User['Username']; ?></h3></td>
                  </tr>
                </table>
                <table width="400" border="0" align="center">
                  
                  <tr>
<td> <span id="sprytextfield1">
                      <label for="Email"></label>
</span>
  <h3><span>    Email:<br>      
    <br>
    <input name="Email" type="text" class="StyleTextField" id="Email" value="<?php echo $row_User['Email']; ?>">
  </span></h3>
  <span><span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  
                  <tr>
                    <td><h3>Password:</h3>
                      <span id="sprytextfield2">
                      <label for="Password"></label>
                      <input name="Password" type="text" class="StyleTextField" id="Password" value="<?php echo $row_User['Password']; ?>">
                    <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><label for="RegisterButton"></label>
                    <input type="submit" name="RegisterButton" id="RegisterButon" value="Update">
                    <input name="UserIDHiddenField" type="hidden" id="UserIDHiddenField" value="<?php echo $row_User['UserID']; ?>"></td>
                  </tr>
                </table>
                <input type="hidden" name="MM_update" value="UpdateForm">
              </form>
            </div>
        </div>
    	<div id="Footer"></div>
    </div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($User);
?>