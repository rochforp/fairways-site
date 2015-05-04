<?php
	session_start();
	require_once 'loginProject.php';
	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	
	if(!$db_server) die ("Unable to connect to mySql: " . mysql_error());
	
	mysql_select_db($db_database) 
		or die("Failed to connect to MySQL: " . mysql_error()); 
 
  $user  = mysql_entities_fix_string($_POST['login']);
  $pass  = mysql_entities_fix_string($_POST['password']);
  $query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";

  function mysql_entities_fix_string($string)
  {
    return htmlentities(mysql_fix_string($string));
  }	

  function mysql_fix_string($string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return mysql_real_escape_string($string);
  }
 
 	$result = mysql_query($query)or die(mysql_error());
 	$num_row = mysql_num_rows($result);
 	$row=mysql_fetch_array($result);
		if( $num_row >=1 ) { 
			header("Location: http://ec2-54-88-70-77.compute-1.amazonaws.com/project/membersOnly.html"); /* Redirect browser */

			$_SESSION['user_name']=$row['name'];
			exit();
		}
		else{
			echo 'Access Denied. Please go back to create and account.';
			
			
			}
 
?>