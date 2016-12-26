
<html>
 <head><title>LAB 02 INT322</title></head>
 <body>

<?php
$usernameerr = "";
$passworderr = "";
$username = "";
$password = "";
$dataValid = true;
if ($_POST) {
	if ($_POST['username'] == "") {
		$usernameerr = "Error - you must fill in a username";
		$dataValid = false;
	}
	if ($_POST['password'] == "") {
		$passworderr = "Error - you must enter password";
		$dataValid = false;
	}
}
?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      username: <input type="text" name=username value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"><?php echo $usernameerr;?> 
      <br/>
      password: <input type="password" name=password value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"><?php echo $passworderr; ?> 
      <br />
      <input type="submit" value="SUBMIT">
    </form>


<?php
if ($dataValid && $_POST) {


        echo $username = $_POST['username'];

        echo "<br>";

        echo $password = $_POST['password'];


}
?>

</body>
</html>


