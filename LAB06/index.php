
<?php

$link = mysqli_connect("db-mysql.zenit", "int322_163d06", "PASSWORD", "int322_163d06")

                                                or die('Could not connect: ' . mysqli_error($link));


function cryptPass($input, $rounds = 7){

		$salt = "";
		$saltChars = array_merge(range('A', 'Z'), range('a', 'z'), range(0,9));
		for($i = 0; $i < 22; $i++){
		$salt .= $saltChars[array_rand($saltChars)];
		}

		return crypt($input,sprintf('$2y$%02d$', $rounds) . $salt); //using blowfish

}	

$pass = "secret";

$hashedpass = cryptPass($pass);

       /* $sql_query = 'INSERT INTO users set username= "james@server.com" , password="'. $hashedpass .'", role= "user", passwordHint= "your favorite game"';  

        $result = mysqli_query($link, $sql_query) or die ('query failed'. mysqli_error($link)); */ 

	$sql_query = 'select *from users';

	$result = mysqli_query($link, $sql_query) or die ('select from query failed' . mysqli_error($link));
	
	print "<br> DATA IN DB: <br>";

	?>
	
	<html>
	<body>
	<table border = "1">
	<tr>
	<th>USERNAME</th><th>PASSWORD</th><th>ROLE</th><th>PASSWORDHINT</th>

	<?php
	
	while($row = mysqli_fetch_assoc($result))
	{

	?>

	<tr>
	<td><?php print $row['username']; ?></td>
	<td><?php print $row['password']; ?></td>
	<td><?php print $row['role']; ?></td>
	<td><?php print $row['passwordHint']; ?></td>
	</tr>

	</body>
	</html>

	<?php
	
	}
	
	?>

