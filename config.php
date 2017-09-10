<?php
error_reporting(0);
$host = "localhost";
$username = "db_username";
$password = "my_password";
$dbname = "db_name";
$connection = mysql_connect($host, $username, $password);

if (!$connection)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
?>