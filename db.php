<?php

$query      = NULL;


function db_connect($dbname) {
   //include database password information etc.
   // connect to mysql server 
   
   // -----------------
   $dbconnect  = NULL;
   $dbhost     = "localhost";
   $dbusername = "root";
   $dbuserpass = "";

   $link = new mysqli($dbhost, $dbusername, $dbuserpass, $dbname);
   if (!$link) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit();
  }
  
  echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//   echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL ."<br>";
  return $link;
  //mysqli_close($link);
   
}
/* function db_connect($dbname)
{
   global $dbconnect, $dbhost, $dbusername, $dbuserpass;
   
   if (mysql_connect($dbhost, $dbusername, $dbuserpass)) {
   	if (mysql_select_db($dbname)) {
		return 1;
   	}
	
   } // end if
   if (!$dbconnect) {
      return 0;
   } elseif (!mysql_select_db($dbname)) {
      return 0;
   } else {
      return $dbconnect;
   } // if

} // db_connect */

?>
