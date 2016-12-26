<html>
<head><title> INT322 LAB03</title></head>
<body>

<?php
$postalerr = "";
$postalcode = $_POST['postalcode'];
$dataValid = true;
if ($_POST) {

	if ($_POST['postalcode'] == ""){
		$postalerr = "Error - postal code field is empty";
		$dataValid = false;
	}elseif (!preg_match("/^\s*[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d\s*$/", $postalcode)) {
		$postalerr = "Error - Enter a valid Postal Code";
		$dataValid = false;
	} 

}
?>

<form method ="POST" action = "" >
	POSTAL CODE: <input type="text" name = postalcode value = "<?php echo $_POST['postalcode'] ?>"><?php echo $postalerr;?>
	<br />
	<input type = "submit" value = "SUBMIT">
</form>

<?php
if ($dataValid && $_POST) {

echo $postalcode = $_POST['postalcode'];

echo "  Code is Valid";

}
?>


</body>
</html>
