<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
session_start();
$uname=$_SESSION["uname"];
	$upass=$_SESSION["upa"];
	$uid=$_SESSION["uid"];
include("../sql.php");
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Winner</title>
</head>

<body bgcolor="#8E7829" >
<div align="center">
<?php
$sql=mysql_query("select * from livebid")	;
while($r=mysql_fetch_array($sql,MYSQL_ASSOC))
{
$uname=$r["uname"];
$id=$r["id"];	
$bidamt=$r["bidamt"];
$biddate=$r["biddate"];
$bidtime=$r["bidtime"];

}
?>
<h1>The winner is ----- <?php echo"$uname";?></h1>
<h1>The amount is ----- <?php echo"$bidamt";?></h1>
<button ><a href="../hscreen/index.php">Exit</a></button>
<button ><a href="../payement/examples/charging-master/index.php">PAy NOw</a></button>
</div>
</body>
</html>