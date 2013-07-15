<?PHP
if (isset($_GET['logOut']))
{
	$_SESSION['loggedIn'] = 0;
	session_destroy();
}
?>