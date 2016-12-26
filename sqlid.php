<?php
  $cxn = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*", "int322_163d06");

if (mysqli_connect_errno()){
        echo "Conecction Failed: " . mysqli_connect_error();
}

$sql_query= "ALTER TABLE 'orders' ADD 'id' INT NOT NULL AUTO_INCREMENT PRIMARY KEY";
if (mysqli_query($cxn, $sql_query))
{
echo "Table created successfully";
}
else
{
echo "Error encountered while creating the table : " . mysqli_error($cxn);
}
?>




