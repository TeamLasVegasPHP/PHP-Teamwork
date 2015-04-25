<?php require_once('../../Connections/MyConnection.php'); ?>
<?php
// *** Logout the current user.
$logoutGoTo = "Login.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
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

$colname_LogOut = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_LogOut = $_SESSION['MM_Username'];
}
mysql_select_db($database_MyConnection, $MyConnection);
$query_LogOut = sprintf("SELECT * FROM users WHERE Username = %s", GetSQLValueString($colname_LogOut, "text"));
$LogOut = mysql_query($query_LogOut, $MyConnection) or die(mysql_error());
$row_LogOut = mysql_fetch_assoc($LogOut);
$totalRows_LogOut = mysql_num_rows($LogOut);
?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Index.css" rel="stylesheet" type="text/css"/>
    <title>Log Out</title>
</head>

<body> 
	<div id="Holder">
    	<div id="Header">

        </div>
    	z.
    	<div id="Content">
        	<div id="PageHeading">
            	<h1>Welcome to my site</h1>
            </div>
        	<div id="ContentLeft">	
        	  <h2>You message here</h2>
              <h6>Other message here</h6>
        	</div>
            <div id="ContentRight">
            
            </div>
        </div>
    	<div id="Footer"></div>
    </div>
</body>
</html>
<?php
mysql_free_result($LogOut);
?>