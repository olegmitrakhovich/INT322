<?php
  $cxn = mysqli_connect("db-mysql.zenit", "int322_163d06", "PASSWORD", "int322_163d06");

if (mysqli_connect_errno()){
        echo "Conecction Failed: " . mysqli_connect_error();
}

$sql_query="CREATE TABLE users(username VARCHAR(100) not null, password blob not null, role enum('user', 'admin') not null, passwordHint varchar(100), primary 
key (username) )";

if (mysqli_query($cxn, $sql_query))
{
echo "Table created successfully";
}
else
{
echo "Error encountered while creating the table : " . mysqli_error($cxn);
}
?>

