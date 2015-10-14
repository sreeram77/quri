<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
session_start();
$uname=$_SESSION["uname"];
	$upass=$_SESSION["upa"];
	$uid=$_SESSION["uid"];
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
	//die("connection error");
	echo "error";
}
mysql_select_db('quri');

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
</head>
<?php
$s=mysql_query("update details set status='n' where id='$uid'");
		if($s)
		{
		header('Location:../home/index.html');
		}
		else
		{
			echo"FAILED UPDATE";
		}

?>
<body>
</body>
</html>