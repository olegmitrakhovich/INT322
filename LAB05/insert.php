<html>
<body>
<?php
$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];

$link = mysqli_connect("db-mysql.zenit", "int322_163d06", "PASSWORD", "int322_163d06")

                                                or die('Could not connect: ' . mysqli_error($link));

        $sql_query = 'INSERT INTO users set username="oleg@hotmail.com", password="PASSWORD", role="user", passwordHint="your favorite game"';

        $result = mysqli_query($link, $sql_query) or die ('query failed'. mysqli_error($link));

?>

</body>
</html>

