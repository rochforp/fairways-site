<?php // scores.php
  require_once 'loginProject.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db($db_database)
    or die("Unable to select database: " . mysql_error());

  $query  = "SELECT * FROM content";
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    echo 'Course: '   . mysql_result($result,$j,'course')   . '<br>';
    echo 'Score: '    . mysql_result($result,$j,'score')    . '<br>';
    echo 'Date: ' . mysql_result($result,$j,'date') . '<br>';
    echo 'Player: '     . mysql_result($result,$j,'player')     . '<br><br>';
    
  }
?>