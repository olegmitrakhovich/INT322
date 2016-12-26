
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
</html>

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
		  if($ordernumber > 0){
                  
		  $link = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*", "int322_163d06")

                  or die('Could not connect: ' . mysqli_error($link));

                  $query = "Select * from orders2";

                  $result = mysqli_query($link,$query) or die ("query failed!");

                                if(mysqli_num_rows($result) > 0) {
                                $shirts = "";
                                while($find = mysqli_fetch_assoc($result)){
                                $shirts += $find['number'];
                                }
                                if($shirts + $ordernumber > 200){
                                $ordererr = "We only have " . (200 - $shirts) . " in stock";
                                $datavalid = false;
                                }
                        }
                }

		
	}


	if($_POST['yes/no'] == "no" && $_POST['ordernumber'] != ""){
		$multipleerr = "Please Check YES for multipleshirt option";
		$datavalid = false;
	}

	if ($datavalid){

	include('update.php');
	
?>	

<?php


	}

}

if (!$datavalid || !$_POST){
?>
<?php
$id = $_GET['id'];

$con = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*", "int322_163d06")
				or die('Could not connect: ' . mysqli_error($con));

//$result = mysqli_query($con, "SELECT * FROM ORDERS2 where id = 165");

$sql = "SELECT * from orders2 where id = $id";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();

//$data = mysqli_fetch_array($result);



?>

<html>
<body>
<form name="tshirt" method="POST" action="">
First Name:<input type="text" name="firstname" value="<?php echo $row["firstName"]; ?>"><?php echo $firstnameerr ?>
<br />
<br />
Last Name:<input type="text" name="lastname" value="<?php echo $row["lastName"]; ?>"><?php echo $lastnameerr ?>

<p>Male or Female:</p> 

<?php
if($row['sex'] == "m")
{
echo "Male<input type='radio' name='sex' value='m' checked>";
echo "Female<input type='radio' name='sex' value = 'f'>";
}
else
{
echo "Male<input type='radio' name='sex' value='m'>";
echo "Female<input type='radio' name='sex' value='f' checked>";
}
?>
<br />
<br />

<?php
if($row['size'] == "s")
{
echo "Tshirt Size:<select name='size'>";
echo "<option value=''>--Please Select--</option>";
echo "<option value='s' name='s' selected>Small</option>";
echo "<option value='m' name='m' >Medium</option>";
echo "<option value='l' name='l' >Large</option>";
echo "</select>";
}

if($row['size'] == "m")
{
echo "Tshirt Size:<select name='size'>";
echo "<option value=''>--Please Select--</option>";
echo "<option value='s' name='s' >Small</option>";
echo "<option value='m' name='m' selected >Medium</option>";
echo "<option value='l' name='l' >Large</option>";
echo "</select>";
}

if($row['size'] == "l")
{
echo "Tshirt Size:<select name='size'>";
echo "<option value=''>--Please Select--</option>";
echo "<option value='s' name='s' >Small</option>";
echo "<option value='m' name='m' >Medium</option>";
echo "<option value='l' name='l' selected >Large</option>";
echo "</select>";
}

?>
<?php echo $tshirterr ?>


<br />
<br />

<?php

if($row['mltp'] == "yes")
{
echo  "Multiple shirts:<input type='checkbox' name='yes/no' id='yes' value='yes' checked> YES"; 
echo  "<input type='checkbox' name='yes/no'  id='no' value='no'> NO";
}
else
{
echo  "Multiple shirts:<input type='checkbox' name='yes/no' id='yes' value='yes'> YES";
echo  " <input type='checkbox' name='yes/no'  id='no' value='no' checked> NO";
}
?>

<?php echo $multipleerr;?>

<br />
<br />
Number to Order:<br />
<input type ="textarea" name = "ordernumber" value="<?php echo $row["number"]; ?>" > <?php echo $ordererr; ?>
<br />
<br />
<input type = "submit" value = "SUBMIT">

</form>
</body>
</html>

<?php
}
?>
