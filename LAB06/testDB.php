<?php

include_once("myclasses.php"); 


$db = new DBlink("int322_163d06");

$result = $db->query ("Select *from users");  

$test = $db->emptyResult(); 

echo $test;



?>
