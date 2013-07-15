<?php
session_start();

include("includes/checklogout.php"); //checks for the logout session variable to kill if logged out

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Pandemonium Gaming</title>
    <meta name="description" content="Eat Play Game">
    <meta name="viewport" content="width=device-width">
    <?PHP include("includes/loginerror.php"); ?>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <script src="jquery.js"></script>
    <script src="cory.js"></script>
    <script src="modernizr.js"></script>
    <link rel="stylesheet" href="css/keyframes.css"/>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div id="head">
        <div class="wrapper">
            <div id="login">
            <?php 
            
            if($_SESSION['loggedIn'] > 0)
            {
                include("includes/usernavloggedin.php");
            }
            else
            {
                //loginform
                echo "<form id=\"form1\" name=\"form1\" method=\"POST\" action=\"includes/processLogin.php\">Username:<input type=\"text\" name=\"name\" size=\"9px\" id=\"name\"/>Password: <input type=\"password\" name=\"password\" size=\"9px\" id=\"password\"/></td><td><input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Submit\" class=\"button\"/></form>";
            }
            
            ?>
            </div> <!--End login div-->
        <a href="index.php"><img class ="logo" src="img/head.png"></a>
        </div><!--End wrapper div-->
    </div><!--End head div-->
    
    <?PHP include("includes/topnav.php"); ?>
    
    <div class="wrapper">
            <div id="about">
                <h1>ABOUT</h1>
                <p>Gaming isn&rsquo;t just a way to waste time; gaming inspires teamwork, personal improvement, and exploration into a new technology.</p>
                
                <p>Gamers can be any age, profession, or place in life looking for competition and excitement.</p>
                
                <p>We are here to enhance this movement, to showcase the best in technology, to foster social networking and new friendships in your community.</p>
                
                <p>We take pride in being gamers, helping the community, growing the e-sports we have all come to love.</p>
                
                <p>No matter where we are on the globe, gaming sews us into a growing network of players.</p>
                
                <p>Our community is creative, easy- going, helpful, smart, and loves to game.</p>
                
                <p>We think you should join us.</p>
            </div> <!--End About Div-->
            
            <!--TWITTER DIVIDER BAR-->
            <div id="twitter"><img src = "img/twitter.png"><script>$.getJSON("https://api.twitter.com/1/statuses/user_timeline/jctpandemonium.json?count=1&include_rts=1&callback=?", function(data) {
                 $("#twitter").html(data[0].text);
            	});</script>
            </div> <!--End twitter div-->
            
            <div id="content" >
                <?PHP include("includes/boxes.php"); ?>
            </div> <!--End content div-->
            
            <div id="bottom" class="clearfix">
                <?PHP include("includes/bottomnav.php"); ?>
            </div> <!--end bottom div-->
        
    </div> <!--end wrapper div-->
</body>
</html>
