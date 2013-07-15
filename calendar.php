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
        <div class="calendar"> <!--NOTE for TEMPLATE: this is where real content goes, lower content divs are for
        				     the boxes at the bottom of the page -->
            <?PHP include("includes/drawcalendar2.php"); ?>
            
            
            <div id="twitter"><img src = "img/twitter.png"><script>$.getJSON("https://api.twitter.com/1/statuses/user_timeline/jctpandemonium.json?count=1&include_rts=1&callback=?", function(data) {
                 $("#twitter").html(data[0].text);
            });</script></div> <!--End twitter div-->
            
            <div id="content" >
                <div class="row">
                    <div class="three columns"  id="stuff1"><h2> ABOUT US:</h2>
                        <div id="conbox">
                            <p>Gaming isn&rsquo;t just a way to waste time; gaming inspires teamwork, personal improvement, and exploration into a new technology.<p></p><a class ="float" href="about.php">Read More ></a>
                        </div> <!--End conbox div-->
                    </div> <!--End three columns div-->
                    
                    <div class="three columns" id="stuff2"><h2>Upcoming Events:</h2>
                        <div id="conbox">
                            <table>
                                <?PHP include("includes/eventbox.php"); ?>
                            </table><a class ="float" href="calendar.php">More Events</a>
                        </div> <!--End conbox div-->
                    </div> <!--End three columns div-->
                    
                    <div class="three columns" id="stuff3"><h2>IDK yet Boxc</h2>
                        <div id="conbox">
                            <p>&nbsp;</p> <!-- TODO: Figure out WTF to put here -->
                        </div> <!--End conbox div-->
                    </div> <!--End three columns div-->
                </div> <!--End row div-->
            </div> <!--End content div-->
            
            <div id="bottom" class="clearfix">
                <?PHP include("includes/bottomnav.php"); ?>
            </div> <!--end bottom div-->
        
        </div> <!--end show div-->
    </div> <!--end wrapper div-->
</body>
</html>
