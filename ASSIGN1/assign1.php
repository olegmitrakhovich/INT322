<?php


//retriving username, password and other data to connect to database
$data = file('/home/int322_163d06/secret/topsecret');

                      $dbserver = trim($data[0]);

                                 $userid   =  trim($data[1]);

                                           $password = trim($data[2]);

                                                     $database = trim($data[3]);

$cxn = mysqli_connect($dbserver, $userid, $password, $database) or die ('Can not connect: ' . mysqli_error($data));

//deleting any previous stored data
$query = 'delete from product';
mysqli_query($cxn, $query) 
				or die ('query did not work' . mysqli_error($cxn));


//getting data from all the files
$typeofphone = file('phone.txt');
$system = file('os.txt');
$price = file ('price.txt');
$model = file ('model.txt');


//indserting data in product table, which was created earlier
for($i = 0; $i < sizeof($typeofphone); $i++){
		$query = 'INSERT INTO product set itemName = "' .trim($typeofphone[$i]).'", model = " '.trim($model[$i]).'", os = " '.trim($system[$i]).'", price = "'.trim($price[$i]).'"'; 
		mysqli_query($cxn,$query) 
					or die ('ERROR' . mysqli_error($cxn));

}


//validating all form information
$valid = true;
$perr = "";
$minerr = "";
$maxerr = "";

if($_POST){

	if($_POST['typeofphone'] == ""){
			$perr = "you must choose a phone";
			$valid = false;		
	}

	if($_POST['pricemax'] == ""){
			$maxerr = "plase enter max value";
			$valid = false;
	}

	if($_POST['pricemin'] == ""){
			$minerr = "please enter minimum value";
			$valid = false;
	}

	if($_POST['pricemin'] > $_POST['pricemax']){
		$minerr = "mininum can not be greater then maximum";
		$valid = false;
	}

}

//if all form information valid select from product table
if($_POST && $valid){
	$maxprice = $_POST['pricemax'];
	$minprice = $_POST['pricemin'];
	$typeofphone = $_POST['typeofphone'];


	$query = "SELECT * FROM product where itemName = '$typeofphone' AND price between $minprice AND $maxprice";
		
	$request = mysqli_query($cxn, $query) 
						or die ('SELECT QUERY FAILED' . mysqli_error($cxn));

//selecting and printing current date
	$query2 = "SELECT CURDATE()";
	$date = mysqli_query($cxn, $query2) or die ('ERROR DATE QUERY' . mysqli_error($cxn));
	$printdate = mysqli_fetch_assoc($date);
	echo "<br>";
	echo $printdate['CURDATE()'];

?>


<html>
<body>
<table border = "1">
<tr>
<th>PHONE</th><th>OS</th><th>MODEL</th><th>PRICE</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($request)){
?>
<tr>
    <td><?php print $row['itemName']?></td>
    <td><?php print $row['os']?></td>
    <td><?php print $row['model']?></td>
    <td><?php print $row['price']?></td>
</tr>

<?php
}

//IF post not active and and information not valid then print out html form.
}else{

?>

<form action="" method = "post">
PHONE: <select name = "typeofphone">
			<option value = "blackberry">BLACKBERRY</option>
			<option value = "iphone">IPHONE</option>
			<option value = "android">ANDROID</option>
			<option value = "razor">RAZOR</option>
			<option value = "sony">SONY</option>
			<option value = "ncage">NCAGE</option>
	</select>
<?php echo $perr;?>
<br/>
<br/>
MINIMUM PRICE:<input type = "text" name = "pricemin" value ="<?php if (isset($_POST['pricemin'])) echo $_POST['pricemin']; ?>">
<?php echo $minerr;?>
<br />
<br />
MAXIMUM PRICE:<input type = "text" name = "pricemax" value ="<?php if (isset($_POST['pricemax'])) echo $_POST['pricemax']; ?>">
<?php echo $maxerr;?>
<br/>
<br/>	
<input type = "submit" value="submit">
</form>
</body>
</html>

<?php
}
?>


