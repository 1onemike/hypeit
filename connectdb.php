<?php

$mysql_host ='localhost';
$mysql_name = 'root';
$mysql_pswd =   '';
$conn_error='Could not connect';
$mysql_db  ='hypeit';

$con=mysqli_connect($mysql_host,$mysql_name,$mysql_pswd);

mysqli_select_db($con,$mysql_db); 







?>