<?php
session_start();

if (!isset($_SESSION['username']))
{
	header("location: login.php");
}

?>

<html>
<body>
<h1> PAGE 2 </h2>
<br / >
<?php echo $_SESSION['username']; ?>
</body>
</html>
