
<html>
<head>
<title> lab 04 int322 </title>
<script>
function refresh(){
	window.location.reload(true);
}
</script>
</head>
<body>
<?php
$firstnameerr = "";
$lastnameerr = "";
$sexerr = "";
$tshirterr = "";
$multipleerr = ""; // yes or no err
$ordererr = "";
$datavalid = true;

$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$sex = $_POST['sex'];
$size = $_POST['size'];
$yesno = $_POST['yes/no'];
$ordernumber = $_POST['ordernumber'];

if ($_POST) {

	if($_POST['firstname'] == ""){
	$firstnameerr = "Error - Please enter first name";
	$datavalid = false;
	}

	if($_POST['lastname'] == ""){
	$lastnameerr = "Error - Please enter last name";
	$datavalid = false;
	}

	if($_POST['sex'] == ""){
	$sexerr = "Error - Please pick gender";
	$datavalid = false;
	}

	if($_POST['size'] == ""){
	$tshirterr = "Error - Please Select size";
	$datavalid = false;
	}

	if($_POST['yes/no'] == ""){
	$multipleerr = "Error-Please select Yes or No";
	$datavalid = false;
	}

	if($_POST['yes/no'] == "yes"){
		if($_POST['ordernumber'] == ""){
		$ordererr = "Please Enter the quantity of t-shirts";
		$datavalid = false;
		}
	}

	if($_POST['yes/no'] == "no" && $_POST['ordernumber'] != ""){
		$multipleerr = "Please Check YES for multipleshirt option";
		$datavalid = false;
	}

	if ($datavalid){
	$link = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*", "int322_163d06")
				or die('Could not connect: ' . mysqli_error($link));
	$sql_query = 'INSERT INTO orders2 set firstName="' . $firstname . '", lastName="' . $lastname . '", sex="' . $sex . '", mltp="' . $yesno . '", 
	number="' . $ordernumber . '", size= "' . $size . '"';
	print $sql_query;

	$result = mysqli_query($link, $sql_query) or die ('query failed'. mysqli_error($link));

	$sql_query = "SELECT * from orders2";

	$result = mysqli_query($link, $sql_query) or die ('query failed'. mysqli_error($link));

	print "<br> NAMES IN DB: <br>";	
?>

<html>
<head>
<iframe style="display:none;" name="target"></iframe>
</head>
<body>
<table border = "1">
<tr>
<th>First Name</th><th> Last Name</th><th>SEX</th><th>SIZE</th><th>MLTP</th><th>QUANTITY</th><th>EDIT</th>
<?php

	while($row = mysqli_fetch_assoc($result))
	{
?>
	<tr>
	<td><?php print $row['firstName']; ?></td>
	<td><?php print $row['lastName']; ?></td>
	<td><?php print $row['sex'];  ?></td>
	<td><?php print $row['size']; ?></td>
	<td><?php print $row['mltp']; ?></td>
	<td><?php print $row['number']; ?></td>
	<td><a target="target" href='reject.php?id="<?php print $row['id'];?>"' onClick="history.go(0)">REJECT</a></td>
	</tr>
<?php
	}
?>
</table>
</body>
</html>

<?php
	mysqli_free_result($result);

	mysqli_close($link);
	echo "<a href=\"javascript:history.go(-1)\">BACK</a>";

	}

}


if (!$datavalid || !$_POST){
?>
<html>
<body>
<form name="tshirt" method ="POST" action="">
First Name:<input type="text" name="firstname" value="<?php if ($_POST['firstname']) echo $_POST['firstname']; ?>"><?php echo $firstnameerr ?>
<br />
<br />
Last Name:<input type="text" name="lastname" value="<?php if ($_POST['lastname']) echo $_POST['lastname']; ?>"><?php echo $lastnameerr ?>

<p>Male or Female:</p> 

Male<input type="radio" name="sex" value="m" <?php if ($_POST['sex'] == "m") echo "CHECKED"; ?>>

Female<input type="radio" name="sex" value="f" <?php if ($_POST['sex'] == "f") echo "CHECKED"; ?>>

<br />
<br />

Tshirt Size:<select name="size">
<option value="">--Please Select--</option>
<option value="s" name="s" <?php if ($_POST['s']) echo "SELECTED"; ?>>Small</option>
<option value="m" name="m" <?php if ($_POST['m']) echo "SELECTED"; ?>>Medium</option>
<option value="l" name="l" <?php if ($_POST['l']) echo "SELECTED"; ?>>Large</option>
</select><?php echo $tshirterr ?>


<br />
<br />

Multiple shirts:<input type="checkbox" name="yes/no" id="yes" value="yes"  <?php if ($_POST['yes/no'] == "yes") echo "CHECKED"; ?>> YES 
		<input type="checkbox" name="yes/no"  id="no" value="no"    <?php if ($_POST['yes/no'] == "no") echo "CHECKED"; ?>> NO
<?php echo $multipleerr;?>

<br />
<br />
Number to Order:<br />
<input type ="textarea" name = "ordernumber"> <?php echo $ordererr; ?>
<br />
<br />
<input type = "submit" value = "SUBMIT">

</form>
<?php
}
?>
</body>
</html>
