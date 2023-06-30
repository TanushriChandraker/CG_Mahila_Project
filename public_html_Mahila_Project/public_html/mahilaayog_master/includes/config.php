<?php
define('DB_SERVER','68.178.145.20');
define('DB_USER','cgmahilaayog');
define('DB_PASS' ,'12345');
define('DB_NAME','mahilaayog');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
//$conn = mysqli_connect(DB_SERVER,DB_USER,'',DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>