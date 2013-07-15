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
            <div class="about">
	            <?PHP
                    
                    
                    unset($_SESSION['username']);
                    unset($_SESSION['password']);
                    unset($_SESSION['password2']);
                    unset($_SESSION['firstname']);
                    unset($_SESSION['lastname']);
                    unset($_SESSION['email']);
                    unset($_SESSION['gender']);
                    unset($_SESSION['psntag']);
                    unset($_SESSION['xboxtag']);
                    unset($_SESSION['age']);
                    unset($_SESSION['shirtsize']);
                    
                    $username=strip_tags($_POST['username']);
                    $password=strip_tags($_POST['password']);
                    $password2=strip_tags($_POST['password2']);
                    $passworde=sha1($password);   								//encrypts the password
                    $first_name=strip_tags($_POST['first_name']);
                    $last_name=strip_tags($_POST['last_name']);
                    $email=strip_tags($_POST['email']);
                    $gender=strip_tags($_POST['gender']);
                    $psntag=strip_tags($_POST['psntag']);
                    $xboxtag=strip_tags($_POST['xboxtag']);
                    $age=strip_tags($_POST['age']);
                    $shirtsize=strip_tags($_POST['shirtsize']);
                    $dob = date('Y-m-d', strtotime(str_replace('/', '-', strip_tags($_POST['dob']))));
                    $secquestion=strip_tags($_POST['secquestion']);
                    $secanswer=strip_tags($_POST['secanswer']);
                    
                
                    
                    
                    
                    
                    //This connects to the mysql DB 
                    include("includes/dbconnect.php");
                    
                    //error checking
                    //check if username is unique	
                    if(mysql_num_rows(mysql_query("SELECT username FROM playerlist WHERE username='$username'")) > 0){
                        echo "That username is already in use, please select another.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                    //check if passwords match
                    elseif($password != $password2){
                        echo "Passwords do not match.  Please try again.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                    
                    //check to be sure the password is long enough
                    elseif(strlen($password) < 8){
                        echo "Password is too short.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                        
                    //check to see if the length is good enough on the username
                    elseif(strlen($username) < 6){
                        echo "Username is too short.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                    
                    //check to see if there is a first name
                    elseif(strlen($first_name) < 1){
                        echo "Please enter your first name.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                    
                    //check to see if there is a last name
                    elseif(strlen($last_name) < 1){
                        echo "Please enter your last name.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                    
                    //check to see if there is a gender selected
                    elseif(strlen($gender) < 1){
                        echo "Please select your gender.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                    
                    //check to see if there is a valid dob
                    elseif(strlen($dob) != 10){
                        echo "Please enter a valid date of birth.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                    //check to see if there is a gender selected
                    elseif(strlen($secquestion) < 1){
                        echo "Please input a valid security question.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                    //check to see if there is a gender selected
                    elseif(strlen($secanswer) < 1){
                        echo "Please input a valid security answer.";
                        echo '<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
                    }
                    
                    
                    else {
                    $token = 1;	//sets useraccess level to 1 (registered user)
					$query = "INSERT INTO playerlist (username, password, first_name, last_name, email_address, gender, psnuser, xboxuser, shirtsize, date_joined, dob, sec_question, sec_answer, token)VALUES('$username', '$passworde', '$first_name', 'last_name', '$email', '$gender', '$psntag', '$xboxtag', '$shirtsize', CURDATE(), '$dob', '$secquestion', '$secanswer', '$token')";
					mysql_query($query) or die(mail('testing@pandemoniumgaming.net', 'wtf process.php', mysql_error()));
                    
                    //kill the mysql connection
                    mysql_close();
                    
                    //reconnect to the mysql DB 
                    include("includes/dbconnect.php");
                    
                    //query to get the user_id for the current record
                    $user_id = mysql_query("SELECT user_id FROM playerlist WHERE username='$username'");
                    $user = mysql_result($user_id, 0, 0);
                    
                    //insert statement to put the league requests in the database
                    
                        
                    //prints a confirmation after data is sent
					echo "<h1>Registration Confirmation</h1>";
                    echo "<br /><p>Thank you <i>$first_name $last_name</i> for registering with us.";
                    echo "<br />Please Login.</p>";
                    }
                    
                ?>
    		</div>
                    
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
        
        </div> <!--end show div-->
    </div> <!--end wrapper div-->
</body>
</html>
