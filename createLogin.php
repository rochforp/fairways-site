<?php 

  require_once 'loginProject.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db($db_database, $db_server)
    or die("Unable to select database: " . mysql_error());
    

  if (isset($_POST['username']) &&
      isset($_POST['password']) &&
      isset($_POST['usernameid']))
     
      
  {
    $username   = get_post('username');
    $password    = get_post('password');
    $usernameid	  = get_post('usernameid');

   

    $query = "INSERT INTO users VALUES" .
      "('$username', '$password', '$usernameid')";

    if (!mysql_query($query, $db_server))
      echo "INSERT failed: $query<br>" .
      mysql_error() . "<br><br>";
  }


  $query  = "SELECT * FROM users";
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());
  $rows = mysql_num_rows($result);
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = mysql_fetch_row($result);
   
  }