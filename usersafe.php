<?php
	session_start();
	require_once("mayen-dbcon.php");
	$db = new db();
	$db -> connect();

	$user = $_POST["textuser"];
	$pass = $_POST["textpass"];
	
	$sql = mysql_query("SELECT * FROM `user` WHERE `uname`='".$user."' AND `pass`='".$pass."' ");
		if($sql){
			while($row = mysql_fetch_assoc($sql)){
				if($row["type"] == "admin"){
					$_SESSION["isAdmin"] = true;
					$_SESSION["type"] = "admin";
					$_SESSION["name"] = "Administrator";
					header("Location:page-mayen.php");
				}
			}
            
            //Trial Login
			
				if($user == "imai" && $pass == "imai123"){
					$_SESSION["isAdmin"] = true;
					$_SESSION["type"] = "admin";
					$_SESSION["name"] = "Administrator Mayen";
					header("Location:page-mayen.php");
				}
            
                elseif($user == "patty" && $pass == "patty123"){
					$_SESSION["isAdmin"] = true;
					$_SESSION["type"] = "admin";
					$_SESSION["name"] = "Administrator Mayen";
					header("Location:page-pat.php");
				}
            
				else{
                    echo "
                        <script>
                            alert('Invalid Username and Password!');
                            window.location='index.php';
                        </script>";
				}
		}
?>