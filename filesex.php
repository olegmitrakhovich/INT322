<html>
	<body>

	<?php require("text.php"); ?>
	<p> Using a require function </p>

	<?php $fopen = @ fopen('text.php', 'r'); 
	      fclose($fopen);	
	?>
	<p> Open file for editing </p>

	<?php
	
	$fopen = @ fopen('text.php', 'r');

	if(!$fopen){
		echo 'PHP error';
	} else {

		$contents = file_get_contents('text.php');
	}
	
	$count = preg_match_all("/wh*/", $contents);

	echo $count;
	
	?>

	<p> matching "wh*" in a file </p>	

	<p> creating a table </p>

	<?php
  	$cxn = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*", "int322_163d06");

	if (mysqli_connect_errno()){
        echo "Conecction Failed: " . mysqli_connect_error();
	}

	$sql_query="CREATE TABLE editing3(preedit DECIMAL(2,0), postedit DECIMAL(2,0), selection DECIMAL(2,0) )";
	if (mysqli_query($cxn, $sql_query))
	{
	echo "Table created successfully";
	}
	else
	{
	echo "Error encountered while creating the table : " . mysqli_error($cxn);
	}
	?>

	<p> storing the count value in editing </p>

	<?php

	$sql_query = 'INSERT INTO editing3 set preedit="' . $count . '"';

        $result = mysqli_query($cxn, $sql_query) or die ('query failed'. mysqli_error($cxn));

	?>

	<p> replace wh with *wh* </p>

	<?php
	$read = fopen('text.php', 'r');
	$writing = fopen('text.tmp', 'w');

	$contents = file_get_contents('text.php');

	$newcontent = str_replace("wh", "*wh*", $contents, $count);

	echo $newcontent;


	$sql_query = 'INSERT INTO editing3 set postedit="' . $count . '"';

        $result = mysqli_query($cxn, $sql_query) or die ('query failed'. mysqli_error($cxn));

	?>

	<p> using fseek() and ftell() </p>

	<?php
	
	$content = fopen("text.php", "r+");

	fseek($content, "782");

	echo ftell($content);

	$filedata = fread($content, filesize('text.php'));

	$filedata = str_replace("wha", "which", $filedata, $count);

	rewind($content); // reset the pointer to the start of the file

	echo $filedata;
	echo "<br />";
	echo $count;

	$sql_query = 'INSERT INTO editing3 set selection="' . $count . '"';

	$result = mysqli_query($cxn, $sql_query) or die ('query failed'. mysqli_error($cxn));
	
	$myfile = fopen("newfile.txt", "w") or die ("Unable to open file!");

	$sql_query = 'SELECT preedit, postedit, selection FROM editing3';
//	$sql_query = 'DELETE from editing3';
	$result = mysqli_query($cxn, $sql_query) or die ('select all query failed'. mysqli_error($cxn));
	echo "<table border='1'>";
	echo "<tr><th>preedit</th><th>postedit</th><th>selection</th></tr>";
	while($row = mysqli_fetch_array($result))
	{
	echo "<tr><td>";
	echo $row['preedit'];
	echo "</td><td>";
	echo $row['postedit'];
	echo "</td><td>";
	echo $row['selection'];
	echo "<td></tr>";
}
	echo "</table>";	

	fwrite($myfile, $filedata) or die ("Unable to write to file!");
	fclose($myfile);

	?>
	</body>
</html>

