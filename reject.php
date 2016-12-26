<?php
$host = "db-mysql";
$user = "int322_163d06";
$pass = "PASSWORD";
$db = "int322_163d06";

$ID = $_GET['id'];
$cxn = mysqli_connect($host, $user, $pass, $db) or die ('Could not connect');
$z = "DELETE FROM orders2 where id=$ID";
$result = mysqli_query($cxn,$z) or die ("couln't");

?>

<html>
<head> 
<script>
function goBack() {
   // window.history.back();
	window.location.assign("table.php");
}
</script>
</head>


<body onload = "goBack()"></body>



</html>
