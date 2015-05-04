<?php
   /*
   //$message = "GET DATA\n---------\n";
   //$message .= arrayToString('$_GET', $_GET);
   $message .= arrayToString('$_GET', $_GET);
   foreach (array_keys($_GET) as $key) {
      $message .= $key . ": " . $_GET[$key] . "\n";
   }
   
   $message .= "POST DATA\n---------\n";
   foreach (array_keys($_POST) as $key) {
      $message .= $key . ": " . $_POST[$key] . "\n";      
   }
	 
   $message .= "SERVER DATA\n---------\n";
   foreach (array_keys($_SERVER) as $key) {
      $message .= $key . ": " . $_SERVER[$key] . "\n";      
   }
	 
   $message .= "ENV DATA\n---------\n";
   foreach (array_keys($_ENV) as $key) {
      $message .= $key . ": " . $_ENV[$key] . "\n";      
   }
   */ 
   function globalsToString()
   {
      // superglobals aren't loaded until accessed
	  $touch = $_SERVER;
	  $touch = $_ENV;
	  
      $message = "";
      foreach ($GLOBALS as $key => $value) {
       $message .= arrayToString('$' . $key, $value) . "\n";
	  }
	  
      //  $message .= arrayToString('$GLOBALS', $GLOBALS);
      //  $message .= arrayToString('$_POST', $_POST);
      //  $message .= arrayToString('$_GET', $_GET);
      //  $message .= arrayToString('$_COOKIE', $_COOKIE);
      //  $message .= arrayToString('$_FILES', $_FILES);
      //  $message .= arrayToString('$_SERVER', $_SERVER);
      //  $message .= arrayToString('$_REQUEST', $_REQUEST);
      //  $message .= arrayToString('$_ENV', $_ENV);
      //  $message .= arrayToString('$http_response_header', $http_response_header);
      $message .= arrayToString('$_SESSION', $_SESSION);	  return $message;
   }
   
   function arrayToString($name, $array) {
   	  //print $name . "," . $array. "\n";
	  //sleep(0.25);
	  
	  if($name == '$GLOBALS') {
	  	return "";
	  }
	  
	  if(! is_array($array)) {
        return $name . '="' . $array . "\"\n";
	  }
	  
	  if(sizeof($array) == 0) {
	  	return $name . "=[]\n";
	  }
		
      $m = '';
	  foreach ($array as $key => $value) {
        $prefix = $name . '["' . $key . '"]';
      	$m .= arrayToString($prefix, $value);
      }
	  return $m;
   }
?>
<html>
<head>
</head>
<body>
<h2>Form submitted: </h2>
<pre>
<?php print(globalsToString()); ?>
</pre>
</body>
</html>