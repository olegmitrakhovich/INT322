<html>
<head>
<iframe style="display:none;" name="target"></iframe>
</head>
<body>
<table border = "1">
<tr>
<th>First Name</th><th> Last Name</th><th>SEX</th><th>SIZE</th><th>MLTP</th><th>QUANTITY</th><th>EDIT</th>

<?php

	$link = mysqli_connect("db-mysql.zenit", "int322_163d06", "PASSWORD", "int322_163d06")
                                or die('Could not connect: ' . mysqli_error($link));

        $sql_query = "SELECT * from orders2";

        $result = mysqli_query($link, $sql_query) or die ('query failed'. mysqli_error($link));

        print "<br> DATA IN DB: <br>";


        while($row = mysqli_fetch_assoc($result))
        {
?>
        <tr>
        <td><?php print $row['firstName']; ?></td>
        <td><?php print $row['lastName']; ?></td>
        <td><?php print $row['sex'];  ?></td>
        <td><?php print $row['size']; ?></td>
        <td><?php print $row['mltp']; ?></td>
        <td><?php print $row['number']; ?></td>
	<?php $totalshirts += $row['number']; ?>
        <td><a href='reject.php?id="<?php print $row['id'];?>"'> REJECT </a><a href='sosstshirt.php?id="<?php print $row['id'];?>"'> EDIT </a></td>
        </tr>
<?php
        }

?>

<?php
//echo "<a href=\"javascript:history.go(-1)\">BACK</a>";
  echo "<a href=\"fsosstshirt.php\">BACK</a>";
  echo $totalshirts;
?>

</table>
</body>
</html>

