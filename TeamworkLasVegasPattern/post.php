<?php @session_start(); ?>
<?php require_once('Connections/MyConnection.php'); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
            <h1>Post a topic into Las Vegas Forum</h1>
        </div>
        <div id="content">
            <form action="post.php" method="post">
                Topic name: <br/><input id="topicName" type="text" name="topic_name"><br/>
                Content: <br/>
                <textarea name="cont"></textarea><br/>
                <input type="submit" name="submit" value="Post" id="submitPost">
            </form>
            <?php
            $t_name = @$_POST['topic_name'];
            $contnt = @$_POST['cont'];
            if(isset($_POST['submit'])){
                if($t_name && $contnt){
                    echo "Success";
                }else{
                    echo "Please, fill all the fields";
                }
            }else{
                echo "You must be logged in.";
            }
            ?>
        </div>
    </div>
    <div id="Footer"></div>
</div>
</body>
</html>
