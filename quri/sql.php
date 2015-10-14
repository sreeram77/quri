<?php
$con=mysql_connect("localhost","","");
if(!$con)
{
	die("connection error");
}
mysql_select_db('quri');

?>
