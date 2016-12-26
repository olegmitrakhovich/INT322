<?php
session_start();

$valid = true;

$user = "";
$password = "";
$email = "";

$usererr = "";
$passworderr = "";
$emailerr = "";
$logfail = "";

if ($_POST) {

	$user = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	if($user == "") {
		$usererr = "username field is empty";
		$valid = false;
	}

	if(!isset($_POST['email']) && $password == "") {
		$passworderr = "password must be filled";
		$valid = false;
	}

	if($email == "" && !isset($_POST['password']))
	{
		$emailerr = "email must be filled";
		$valid = false;
	}

	if($valid){


		$cxn = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*", "int322_163d06");

		if (mysqli_connect_errno()){
			echo "Connection Failed: " . mysqli_connect_error();
		}

		if(isset($_POST['email']))
		{
			
			$sql = "SELECT * FROM users where username = '$user'";
			$request = mysqli_query($cxn, $sql) or die ('request failed'. mysqli_error($cxn));

			$numberofrows = mysqli_num_rows($request);
			if ($numberofrows == 1)
			{
				$numberofrows = mysqli_fetch_assoc($request);

				$sendto = $email;
			
				$subject ="YOUR PASSWORD HINT";
				
				$message = "Username: $user Password Hint: " . $numberofrows['passwordHint'];

				$header = "Reply to: oomitrakhovich@myseneca.ca";

				mail($sendto, $subject, $message, $header) or die ('mail sent failed');
				
				unset($_GET['forgot']);	
			}
		}else{
		
				$sql = "select * from users where password = '$password' AND username = '$user'";
			
				$request = mysqli_query($cxn, $sql) or die ('request failed 2' . mysqli_error($cxn));

				$numberofrows = mysqli_num_rows($request);
				
				if ($numberofrows == 1)
				{
					$_SESSION['username'] = $user;

					header("location: protectedstuff.php");

				}else {
					$user = "";
					$password = "";
					$logfail = "Invalid username or password";
				}	

			}

			mysqli_close($cxn);
	}

}
?>


<html>

<body>
	<h1><?php echo isset($_GET['forgot']) ? "Search Password" : "Login"; ?> </h1>
	
	<br>


	<form method = "POST" action = "">

				
			UserName: <input type = "text" name= "username" value= "<?php echo $user; ?>" /><?php echo $usererr; ?>

		<?php if (isset($_GET['forgot'])) { ?>

			<br>

			Email: <input type = "text" name = "email" value = "<?php echo $email; ?>" /><?php echo $emailerr; ?>			

		<?php } else { ?>
			
			<br>

			 Password: <input type = "password" name= "password" value = "<?php echo $passworderr; ?>" /> <?php echo $passworderr; ?>

		<?php } ?>
		
			<?php echo $logfail; ?>
			<br>
			<input type = "submit" value = "submit" >

		<?php if (!isset($_GET['forgot'])) { ?>

			<br>

			<a href="login.php?forgot" /> FORGOT PASSWORD

		<?php } ?>

		</form>
		</body>
		</html>


