<?php @session_start(); ?>
<?php require_once('../../Connections/MyConnection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "2";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "Login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
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

$currentPage = $_SERVER["PHP_SELF"];

if ((isset($_POST['DeleteUsersHiddenField'])) && ($_POST['DeleteUsersHiddenField'] != "")) {
  $deleteSQL = sprintf("DELETE FROM users WHERE UserID=%s",
                       GetSQLValueString($_POST['DeleteUsersHiddenField'], "int"));

  mysql_select_db($database_MyConnection, $MyConnection);
  $Result1 = mysql_query($deleteSQL, $MyConnection) or die(mysql_error());

  $deleteGoTo = "AdminMenageUsers.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
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

$maxRows_MenageUsers = 10;
$pageNum_MenageUsers = 0;
if (isset($_GET['pageNum_MenageUsers'])) {
  $pageNum_MenageUsers = $_GET['pageNum_MenageUsers'];
}
$startRow_MenageUsers = $pageNum_MenageUsers * $maxRows_MenageUsers;

mysql_select_db($database_MyConnection, $MyConnection);
$query_MenageUsers = "SELECT * FROM users ORDER BY `Timestamp` DESC";
$query_limit_MenageUsers = sprintf("%s LIMIT %d, %d", $query_MenageUsers, $startRow_MenageUsers, $maxRows_MenageUsers);
$MenageUsers = mysql_query($query_limit_MenageUsers, $MyConnection) or die(mysql_error());
$row_MenageUsers = mysql_fetch_assoc($MenageUsers);

if (isset($_GET['totalRows_MenageUsers'])) {
  $totalRows_MenageUsers = $_GET['totalRows_MenageUsers'];
} else {
  $all_MenageUsers = mysql_query($query_MenageUsers);
  $totalRows_MenageUsers = mysql_num_rows($all_MenageUsers);
}
$totalPages_MenageUsers = ceil($totalRows_MenageUsers/$maxRows_MenageUsers)-1;

$queryString_MenageUsers = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_MenageUsers") == false && 
        stristr($param, "totalRows_MenageUsers") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_MenageUsers = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_MenageUsers = sprintf("&totalRows_MenageUsers=%d%s", $totalRows_MenageUsers, $queryString_MenageUsers);
?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
    <title>NewDocument</title>
</head>

<body> 
	<div id="Holder">
    	<div id="Header">
        	
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
            	<h1>Welcome to Admin CP</h1>
          </div>
    <div id="ContentLeft">	
        	  <h2>Account links</h2>
              <h6>Other message here</h6>
        	</div>
            <div id="ContentRight">
            	<table width="670" border="0" align="center">
              <tr>
                <td align="left" valign="top">Showing&nbsp;<?php echo ($startRow_MenageUsers + 1) ?> to <?php echo min($startRow_MenageUsers + $maxRows_MenageUsers, $totalRows_MenageUsers) ?> of <?php echo $totalRows_MenageUsers ?> </td>
              </tr>
              <tr>
                <td align="center" valign="top"><?php if ($totalRows_MenageUsers > 0) { // Show if recordset not empty ?>
                    <?php do { ?>
                    <table width="500" border="0">
                      <tr>
                        <td><?php echo $row_MenageUsers['Fname']; ?>  <?php echo $row_MenageUsers['Lname']; ?> /<?php echo $row_MenageUsers['Email']; ?></td>
                      </tr>
                      <tr>
                        <td><form action="" method="post" name="DeleteUsersForm" id="DeleteUsersForm">
                          <input name="DeleteUsersHiddenField" type="hidden" id="DeleteUsersHiddenField" value="<?php echo $row_MenageUsers['UserID']; ?>">
                                                                                    <label for="DeleteUsersButton"></label>
                          <input type="submit" name="DeleteUsersButton" id="DeleteUsersButton" value="Delete User">
                        </form>                    </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                                                              </table>
                      <?php } while ($row_MenageUsers = mysql_fetch_assoc($MenageUsers)); ?>
                  <?php } // Show if recordset not empty ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><table width="200" border="0">
                  <tr>
                    <td><?php if ($pageNum_MenageUsers > 0) { // Show if not first page ?>
                        <a href="<?php printf("%s?pageNum_MenageUsers=%d%s", $currentPage, max(0, $pageNum_MenageUsers - 1), $queryString_MenageUsers); ?>">Previous</a>
                        <?php } // Show if not first page ?>
</td>
                    <td><?php if ($pageNum_MenageUsers < $totalPages_MenageUsers) { // Show if not last page ?>
                        <a href="<?php printf("%s?pageNum_MenageUsers=%d%s", $currentPage, min($totalPages_MenageUsers, $pageNum_MenageUsers + 1), $queryString_MenageUsers); ?>">Next</a>
                        <?php } // Show if not last page ?></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            </div>
    	</div>
    	<div id="Footer"></div>
    </div>
</body>
</html>
<?php
mysql_free_result($User);

mysql_free_result($MenageUsers);
?>