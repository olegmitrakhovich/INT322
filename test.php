<html>
<body>
<?php
if (count($_POST)) {
echo 'You have submitted the string: '.$_POST['string'];
}
?>

<form action="" method="post">
<input type="text" name="string">
<button type="submit">Submit!</button>
</form>

</body>
</html>
