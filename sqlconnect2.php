<?php
  $cxn = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*", "int322_163d06");

if (mysqli_connect_errno()){
	echo "Conecction Failed: " . mysqli_connect_error();
}

$sql_query="CREATE TABLE orders2(id int(11) AUTO_INCREMENT, firstName VARCHAR(30), lastName VARCHAR(30), sex VARCHAR(2), size VARCHAR(2), mltp VARCHAR(4), 
number DECIMAL(2,0), PRIMARY KEY(id))";
if (mysqli_query($cxn, $sql_query))
{
echo "Table created successfully";
}
else
{
echo "Error encountered while creating the table : " . mysqli_error($cxn);
}
?>
