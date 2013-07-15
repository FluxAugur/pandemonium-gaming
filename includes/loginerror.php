<?PHP
if ($_SESSION['loggedIn'] == -1)
	{
		echo "<script type='text/javascript'>alert('Username Does Not Exist In Database');</script>";
		$_SESSION['loggedIn'] = 0;
	}
?>
	