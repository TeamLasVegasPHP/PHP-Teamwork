<?php @session_start(); ?>
<?php require_once('../../Connections/MyConnection.php'); ?><?php
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
    <link href="CSS/Index.css" rel="stylesheet" type="text/css"/>
    <title>Forum</title>
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
            	<h1>Welcome to my forum!!!!!!</h1>
          </div>
    <div id="ContentLeft">	
        	  <h2>Discussions</h2>
        	  <p> 01</p>
        	  <p>02</p>
        	  <p>03</p>
        	  <p>04</p>
        	  <p>05</p>
        	  <p>06</p>
        	  <p>07</p>
        	  <p>08</p>
        	  <p>09</p>
        	  <p>10</p>
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
mysql_free_result($User);

mysql_free_result($MenageUsers);
?>