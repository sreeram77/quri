<!doctype html>
<html>
<head>
<meta charset="UTF-8">
</head>
<?php
session_start();
	$uname=$_SESSION["uname"];
	$upass=$_SESSION["upa"];
	$status="a";

include("../sql.php");

$sql=mysql_query("update livebid set status='n' where uname='$uname'");
?>

<dialog id="window">  
    <h3>Sample Dialog!</h3>  
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, inventore!</p>  
    <button id="exit">Close Dialog  
</dialog>  
<button id="show">Show Dialog</button>  
<?php




header('Location:../hscreen/index.php');

?>
<body>
</body>
</html>