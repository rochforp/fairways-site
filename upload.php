<?php 

  require_once 'loginProject.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db($db_database, $db_server)
    or die("Unable to select database: " . mysql_error());
    

  if (isset($_POST['course']) &&
      isset($_POST['score']) &&
      isset($_POST['date']) &&
      isset($_POST['player']))
      
  {
    $course   = get_post('course');
    $score    = get_post('score');
    $date	  = get_post('date');
    $player   = get_post('player');
   

    $query = "INSERT INTO content VALUES" .
      "('$course', '$score', '$date', '$player')";

    if (!mysql_query($query, $db_server))
      echo "INSERT failed: $query<br>" .
      mysql_error() . "<br><br>";
  }

  echo <<<_END
  <p><h3><a href="memberScores.html"> Back </a></h3></p>
  <form action="upload.php" method="post"><pre>
    Course:  <input type="text" name="course">
    Score:   <input type="text" name="score">
    Date:    <input type="text" name="date">
    Player:  <input type="text" name="player">
     
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

  $query  = "SELECT * FROM content";
  $result = mysql_query($query);

  if (!$result) die ("Database access failed: " . mysql_error());
  $rows = mysql_num_rows($result);
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = mysql_fetch_row($result);
    echo <<<_END
  <pre>
    Course: $row[0]
    Score: $row[1]
    Date: $row[2]
    Player: $row[3]
    

  </pre>
  <form action="upload.php" method="post">
 </form>
_END;
  }
  
  mysql_close($db_server);
  
  function get_post($var)
  {
    return mysql_real_escape_string($_POST[$var]);
  }
?>
