<?php
// define('DB_SERVER','bom1plzcpnl493942');
// define('DB_USER','cgmahilaayog');
define('DB_SERVER','localhost');
define('DB_USER','root');
//define('DB_PASS' ,'Cgmahila@2000');
//define('DB_PASS' ,'12345');
define('DB_PASS' ,'');
define('DB_NAME','mahilaayog');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>