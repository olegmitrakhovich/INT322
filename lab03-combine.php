<html>
<head><title> INT322 LAB03 Combine</title></head>
<body>

<?php
$postalerr = "";
$phoneerr = "";
$subjecterr = "";
$postalcode = $_POST['postalcode'];
$phonenumber= $_POST['phonenumber'];
$subjectcode= $_POST['subjectcode'];
$dataValid = true;
if ($_POST) {

	if ($_POST['postalcode'] == ""){
		$postalerr = "Error - Postal Code field is empty";
	}else if (!preg_match("/^\s*[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d\s*$/", $postalcode)) {
                $postalerr = "Error - Enter a valid Postal Code";
        }

	
	if ($_POST['phonenumber'] == "") {
		$phoneerr = "Error - Phone Number field is empty";
	}else if (!preg_match("/^\s*([(])?\d\d\d([)])?([-\s])?\d\d\d([-\s])?\d\d\d\d\s*$/", $phonenumber)) {
		$phoneerr = "Error - Enter a valid Phone Number";
	}

	if ($_POST['subjectcode'] == ""){
                $subjecterr = "Error - Subject code field is empty";
        }elseif (!preg_match("/^\s*[A-Z][A-Z][A-Z]\d\d\d[A-Z]([A-Z])?([A-Z])?\s*$/", $subjectcode)) {
                $subjecterr = "Error - Enter a valid Subject Code";
        }

	

}
?>

<form method = "POST" action = "" >

        POSTAL CODE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name = postalcode value = "<?php echo $_POST['postalcode'] ?>"><?php echo $postalerr;?>
	
	<?php
	if ($postalerr == "" && $_POST) {
	echo $postalcode = $_POST['postalcode'];
	echo " Postal Code is Valid";
	echo "<br />";
	}
	?>

        <br />

	
	
	PHONE NUMBER: &nbsp;<input type="text" name = phonenumber value = "<?php echo $_POST['phonenumber'] ?>"><?php echo $phoneerr;?>

	<?php
	if ($phoneerr == "" && $_POST) {
	echo $phonenumber = $_POST['phonenumber'];
	echo "  Phone Number is Valid";
	echo "<br />";
	}
	?>

        <br />


	SUBJECT CODE: &nbsp;&nbsp; <input type="text" name = subjectcode value = "<?php echo $_POST['subjectcode'] ?>"><?php echo $subjecterr;?>

	<?php
	if ($subjecterr == "" && $_POST) {
	echo $subjectcode = $_POST['subjectcode'];
	echo "  Code is Valid";
	echo "<br />";
	}
	?>
	
        <br />


	<input type = "submit" value = "SUBMIT">
</form>

</body>
</html>
