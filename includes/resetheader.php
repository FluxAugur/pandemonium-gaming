<?php
unset($_SESSION['wronginfo']);

	//get the username from the session variable
	$username = strip_tags(trim($_SESSION['username']));

//check to see if the username is not set before going any further
if(!isset($_SESSION['username']))
{
	$newname = strip_tags($_POST['newname']);
	$_SESSION['username'] = $newname;
	$drawform = "<div align=\"center\"><form id=\"newname\" name=\"newname\" method=\"POST\" action=\"resetpw.php\">Username:<input type=\"text\" name=\"newname\" id=\"newname\"/><input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Submit\" /></form></div>";
}

else
	{
	
	//get the post data and properly trim/strip it
	$password = strip_tags(trim($_POST['newpw']));
	$newpw = sha1(strip_tags(trim($_POST['newpw'])));//encrypts the password
	$newpw2 = sha1(strip_tags(trim($_POST['newpw2'])));
	$submit = strip_tags(trim($_POST['submit2']));
	$useranswer = strip_tags(trim($_POST['secanswer']));

	//connect to the database
	include("dbconnect.php");
	
	//execute the query to get the security question/answer from the user
	$query2 = "SELECT sec_question, sec_answer FROM playerlist WHERE username = '$username'";
	$result2 = mysql_query($query2);
	$line2 = mysql_fetch_assoc($result2);
	$secanswer = $line2['sec_answer'];
	$secquestion = $line2['sec_question'];
	
	//set variable query for a query statement and password ='$pw'
	$query = "select count(*) from playerlist where username = '$username' and sec_answer = '$secanswer'";	
	$result = @mysql_query($query);//execute the query
	$line = @mysql_fetch_assoc($result);//store the data from database into variable line
	
	
		//check if a record exists matching the database query
		if ($line['count(*)'] == 1)
		{
			//check to make sure the new passwords
			if($newpw != $newpw2)
			{
				$error = "<h1>Passwords do not match.  Please try again.</h1>";
			}
			
			//check to be sure the password is long enough
			elseif(strlen($password) < 8)
			{
				$error = "<h1>Password is too short.</h1>";
			}

			//check to see if the question was answered properly
			elseif($useranswer != $secanswer)
			{
				$error = "<h1>Incorrect security question response.</h1>";
			}
			
			//post error checking update the playerlist
			else
			{
				$_SESSION['reset'] = "Y";
				mysql_query("update playerlist set password = '$newpw' where username = '$username'") or die(mysql_error());
			}
		}
		//the input was incorrect, reset the session variable to redo the form
		else
			if (isset($_POST['submit2']))
			{
			$_SESSION['wronginfo'] = "Y";
			}
	
	}
?>