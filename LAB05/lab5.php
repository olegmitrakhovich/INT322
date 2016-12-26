<?php
$namecookie = "";
$cookie = "";

$namecookie = $_POST['namecookie'];
$cookie  = $_POST['cookie'];

$cookieerr = "";
$namecookieerr = "";

$datavalid = true;

if ($_POST) {

        if($_POST['namecookie'] == ""){
        $namecookieerr = "Error - Please enter namecookie";
        $datavalid = false;
        }

        if($_POST['cookie'] == ""){
        $cookieerr = "Error - Please enter cookie";
        $datavalid = false;
        }

       

?>

