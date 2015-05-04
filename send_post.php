<?php
require_once 'loginProject.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db($db_database, $db_server)
    or die("Unable to select database: " . mysql_error());
    
    if (isset($_POST['username']) &&
      isset($_POST['password']))
      
  {
    $username   = get_post('username');
    $password    = get_post('password');
   

$query = "INSERT INTO users VALUES" .
      "('$username', '$password')";

if (mysql_query($query,$db_server)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysql_error($db_server);
}


mysql_close($db_server);
  

?>