<?php 

if(!isset ($_COOKIE['count'])){
	setcookie("count", 1, time()+3600);
}else{
	setcookie("count", $_COOKIE['count']+1, time()+3600);

}

if ($_POST) {

	$namecookie = $_POST['namecookie'];
	$cookie = $_POST['cookie'];
        setcookie("$namecookie", "$cookie", time()+3600);


}
?>

<!doctype html>
<html>
<head>
<title> LAB 5 </title>
</head>
Welcome back! you visisted this page
<?php
echo $_COOKIE['count'];
?>
times
<body>
<form name="cookies" method="POST" action="">
COOKIE:<input type="text" name="namecookie">
<br />
<br />
Value Cookie: <input type="text" name="cookie">
<input type = "submit" value = "SUBMIT">
</form>
</body>

<?php
var_dump($_COOKIE);
?>
</html>
