<?php 
	session_start();

	include("dbconnect.php");
	
	if ($_POST['submit'] != 'Submit')
	{
		header("Location: ../index.php");
	}
	
	//Gather the POST data from the submitted form
	$username = $_POST['name'];
	$password = $_POST['password'];
	
	if (!isset($username) && !isset($password))
	{
		header("Location: ../index.php");
	}
	
	$escapedUserName = mysql_real_escape_string($username);
	$shaPw = sha1($password);
	
	$query = "SELECT count(*) FROM playerlist"; 
	$query .= " WHERE username = '$username' AND password = '$shaPw' LIMIT 1";
	
	$mysql = mysql_query($query) or die(mail("rogha189@gmail.com", "MYSQL_QUERY ERROR", mysql_error()));
	
	$results = mysql_fetch_assoc($mysql);
	
	
	
	if ($results['count(*)'] == 0)
	{
		$_SESSION['loggedIn'] = -1;
	}
	else if ($results['count(*)'] == 1)
	{
		//retrieve user permissions
		$query = "SELECT token FROM playerlist WHERE username = '$username'";
		$mysql = mysql_query($query);
		$result = mysql_fetch_assoc($mysql);

		$_SESSION['loggedIn'] = $result['token'];
	}
	else
	{
		header("Location: ../index.php");
	}
	
	//TODO setcookies right har
	//set any session variables that you may want
	$_SESSION['username'] = $escapedUserName;
	
	header("Location: ../index.php");

?>