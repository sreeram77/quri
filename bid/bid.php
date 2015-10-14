<?php
session_start();
	$uname=$_SESSION["uname"];
	$upass=$_SESSION["upa"];
	$status="a";

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
	//die("connection error");
	echo "error";
}
mysql_select_db('quri');

?>

<?php


if(isset($_POST["submit"]))
{
$bamt=$_POST["msg"];
$bdate=date("Y-m-d");
$btime=date("h:i:sa");

$bidamt=$bamt;
$biddate=$bdate;
$bidtime=$btime;




if($bamt=="")
	{
			echo "<br/>";echo "<br/>";echo "<br/>";
		echo "Please fill up all the details.";
		echo "<br/>";
	}
	else
	{  $regexp = "/[^0-9]/";
      // Validate the syntax 
		if(preg_match($regexp, $bamt))
		{
			echo "<br/>";
			echo "Please enter a valid amount";
			echo "</br>";
			echo "enter only numbers.";
			
		}
		else 
		{
			
$sql=mysql_query("insert into bidding(`uname`,`bamt`,`bdate`,`btime`) values('$uname','$bamt','$bdate','$btime')");
		
			if(!$sql)
			{
			
				$_SESSION["msg"]= "<h1 style='color:#FF0000'>FAILED...!!!</h1>";
				
			}
				else
			{
					
				$_SESSION["msg"]= "<h1 style='color:#FFF;text-align: center;'>Thank You For registring </h1>";  
				//header('location:#tologin');
			
			}
			
$sql=mysql_query("insert into livebid(`uname`,`bidamt`,`bidtime`,`biddate`,`status`) values('$uname','$bidamt','$bidtime','$biddate','$status')");
		
			if(!$sql)
			{
			
				$_SESSION["msg"]= "<h1 style='color:#FF0000'>FAILED...!!!</h1>";
				
			}
				else
			{
					
				$_SESSION["msg"]= "<h1 style='color:#FFF;text-align: center;'>Thank You For registring </h1>";  
				header('location:index.php');
			
			}
			
			
		}
	}
}
?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>BOOTSTRAP CHAT EXAMPLE</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />

</head>
<body style="font-family:Verdana">
  <div class="container">
<div class="row " style="padding-top:40px;">
    <h3 class="text-center" >BOOTSTRAP CHAT EXAMPLE </h3>
    <br /><br />
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                RECENT CHAT HISTORY
            </div>
            <div class="panel-body">
<ul class="media-list">

                                    <li class="media">

                                        <div class="media-body">

                                            <div class="media">
                                            
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle " src="assets/img/user.png" />
                                                </a>
                                                <div class="media-body" >
                                                    Donec sit amet ligula enim. Duis vel condimentum massa.
              
              Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim. 
                                                    Duis vel condimentum massa.
                                                    Donec sit amet ligula enim. Duis vel condimentum massa.
                                                    <br />
                                                   <small class="text-muted">Alex Deo | 23rd June at 5:00pm</small>
                                                    <hr />
                                                </div>
                                            </div>

                                        </div>
                                    </li>
    
     <li class="media">

                                        <div class="media-body">
                                        

                                            <div class="media">
                         <?php
$i=2;
$sql=mysql_query("select * from livebid ")	;
while($r=mysql_fetch_array($sql,MYSQL_ASSOC))
{
$uname=$r["uname"];
$id=$r["id"];
$bidamt=$r["bidamt"];
$biddate=$r["biddate"];
$bidtime=$r["bidtime"];
$i=$i+1;
?>     
                                            
                                                <a class="pull-left" href="#">

                                                    <img class="media-object img-circle " src="assets/img/user.gif" />
                                                </a>
                                             <div class="media-body" >
                                                    <?php echo $bidamt; ?>
                                                    <br />
                                                   <small class="text-muted"><?php echo $uname; ?> | <?php echo $bidtime; ?></small>
                                                    <hr />
                                                      
                                                </div>
                                               <?php } ?>
                                            </div>

                                        </div>
                                    </li>
                                    
                                </ul>
            </div>
            <div class="panel-footer">
                <div class="input-group">
                                <form action="" method="post">
                                     <span class="input-group-btn"><input type="text" class="form-control" name="msg" placeholder="Enter Amount here" />
                                   <button type="submit" name="submit" class="btn btn-info"/>Bid</button>
                                       </span> </form>
                                    
                                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
               ONLINE USERS
            </div>
            <div class="panel-body">
                <ul class="media-list">

 

                    <li class="media">

                                        <div class="media-body">

                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.gif" ></img>
                                                </a>
<?php
$i=2;
$sql=mysql_query("select * from livebid where status='a'")	;
while($r=mysql_fetch_array($sql,MYSQL_ASSOC))
{
$uname=$r["uname"];
$id=$r["id"];
$bidamt=$r["bidamt"];
$biddate=$r["biddate"];
$bidtime=$r["bidtime"];
$i=$i+1;
?>     
                                                <div class="media-body" >
                                                    <h5><?php echo"$uname"; ?> </h5>
                                                    
                                                   <small class="text-muted">Active</small>
                                                </div>
                                                <?php } ?>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                </div>
            </div>
        
    </div>
</div>
  </div>
</body>
</html>
