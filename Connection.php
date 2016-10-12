<?php //Connection.php
$username = "root";
$password = "";
$db = "JobSearch";
$host = "localhost";

$conn = mysql_connect($host,$username,$password);
if(!$conn)
    die("Enable to connect to database".mysql_error ());
mysql_select_db($db) or die("Enable to select the database".  mysql_error());

?>




