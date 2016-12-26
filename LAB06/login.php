<?php
session_start();

if($_POST){

$user = $_POST['username'];
$password = $_POST['password'];


                $cxn = mysqli_connect("db-mysql.zenit", "int322_163d06", "W6dvjw12345&*", "int322_163d06");

                if (mysqli_connect_errno()){
                        echo "Connection Failed: " . mysqli_connect_error();
                }

                     

                        $sql = "SELECT * FROM users where username = '$user'";
			
                        $request = mysqli_query($cxn, $sql) or die ('request failed'. mysqli_error($cxn));
			
			$numberofrows = mysqli_fetch_assoc($request);

			$hashedpassword = $numberofrows['password'];

			echo $hashedpassword;
		
		if(crypt($password, $hashedpassword) == $hashedpassword){
			
			echo "<br /> YOU ARE LOGGED IN";
			
			$_SESSION['username'] = $user;
			
		}else{
			echo "<br /> YOU ARE NOT LOGGED IN";
		}

                        
 }                     
			 
                       

?>



<html>
<body>

        <br>


        <form method = "POST" action = "">


                        UserName: <input type = "text" name= "username" value= "" />

                        Password: <input type = "password" name= "password" value = "" /> 

                        <input type = "submit" value = "submit" >





                </form>
                </body>
                </html>

