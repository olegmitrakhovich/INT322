<?php
  $cxn = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*", "int322_163d06");

if (mysqli_connect_errno()){
        echo "Conecction Failed: " . mysqli_connect_error();
}

$sql_query="CREATE TABLE product(id int zerofill not null AUTO_INCREMENT, itemName VARCHAR(40) not null, model VARCHAR(30) not null, os VARCHAR(10) not null, 
price decimal(10,2) not null,  PRIMARY KEY(id))";
if (mysqli_query($cxn, $sql_query))
{
echo "Table created successfully";
}
else
{
echo "Error encountered while creating the table : " . mysqli_error($cxn);
}
?>

