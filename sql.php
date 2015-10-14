<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
	//die("connection error");
	echo "error";
}
mysql_select_db('quri');

?>