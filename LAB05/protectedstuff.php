<?php

session_start();

if (!isset($_SESSION['username']))
{

	header("location: login.php");

}

if (isset($_GET['logout']))
{

	session_unset();
	setcookie("PHPSESSID", "", time() - 61200, "/");
	session_destroy();

}

?>

<html>
<body>

	<h1>Protected Tings</h1>
	<hr>
	<?php

		if(isset($_SESSION['username']))
		{
		echo 'Logged in!';
		echo '<a href="protectedstuff.php?logout">logout</a>';
		}
		else
		{
		echo 'LOGGED OUT!';
		echo '<a href="protectedstuff.php">LOGIN</a>';
		}
	?>
</body>
</html>
