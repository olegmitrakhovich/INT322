<?php



class DBlink{
	private $link;
	private	$result;

	public 
	
	function __construct($database_name) {
	$link = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*") or die ('error');
	mysqli_select_db($link, $database_name) or die ('error 1');
	$this -> link = $link;
	}
   
	function __destruct() {
	mysqli_close($this -> link);
	}

	function query($sql_query){
	$result = mysqli_query ($this -> link, $sql_query) or die ('error 2');
	$this -> result = $result;
	}

	function emptyResult(){

	if($this -> result){
		return "true";

	}else{
		return "false";
	}
	}

}



?>
