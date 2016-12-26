

<html>
<body>
<?php
$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$sex = $_POST['sex'];
$size = $_POST['size'];
$yesno = $_POST['yes/no'];
$ordernumber = $_POST['ordernumber'];

$link = mysqli_connect("db-mysql.zenit", "int322_163d06", "PASSWORD", "int322_163d06")
         
						or die('Could not connect: ' . mysqli_error($link));
        
	$sql_query = 'INSERT INTO orders2 set firstName="' . $firstname . '", lastName="' . $lastname . '", sex="' . $sex . '", mltp="' . $yesno . '",
        number="' . $ordernumber . '", size= "' . $size . '"';
        
        $result = mysqli_query($link, $sql_query) or die ('query failed'. mysqli_error($link));
	
?>

<script>
window.location = "table.php";
</script>
</body>
</html>
