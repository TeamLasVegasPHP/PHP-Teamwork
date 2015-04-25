<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/Index.css" rel="stylesheet" type="text/css"/>
    <title>Forgot Password</title>
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
        	<div id="ContentLeft">	
        	  <h2>You message here</h2>
              <h6>Other message here</h6>
        	</div>
            <div id="ContentRight">
            	<form action="EMPWScript.php" method="post" name="EMPWForm" id="EMPWForm">
                
                  <span id="sprytextfield1">
                  <label for="Email"></label>
                  </span>
                  <h3><span>                  Enter Your Email Address:</span></h3>
                  <h3><span><br>
                  <input name="Email" type="text" class="StyleTextField" id="Email">
                  </span></h3>
                  <span><span class="textfieldRequiredMsg">A value is required.</span></span>
           	      <p>
           	        <label for="SendEmailButton"></label>
           	        <input type="submit" name="SendEmailButton" id="RegisterButon" value="Send Email">
           	      </p>
            	</form>
            </div>
        </div>
    	<div id="Footer"></div>
    </div>
    <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
    </script>
</body>
</html>