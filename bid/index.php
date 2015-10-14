<?php
session_start();
	$uname=$_SESSION["uname"];
	$upass=$_SESSION["upa"];
	$status="a";
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include("../sql.php");

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
$sql=mysql_query("select * from livebid")	;
			while($r=mysql_fetch_array($sql,MYSQL_ASSOC))
			{
						
					$ba=$r["bidamt"];
					$biddate=$r["biddate"];
					$bidtime=$r["bidtime"];

			}
			//echo "$ba";
			
			if($ba<=$bidamt)
					{
								echo "<br/>";
								echo "Please enter a valid amount less than the last bid amount";
					}	
					else{



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
			
$sql=mysql_query("insert into bidding(`uname`,`bamt`,`bdate`,`btime`)values('$uname','$bamt','$bdate','$btime')");
		
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
				//header('location:index.php');
			
			}
			
			
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
    
     <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../cssmenu/styles.css">
      <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../cssmenu/script.js"></script>
   
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  
   <script>
 function autoRefresh_div()
 {
      //window.location="#xyz";
	  $("#xyz").load("refresh.php"); // a function which will load data from other file after x seconds
  }

  setInterval('autoRefresh_div()', 2000); // refresh div after 5 secs
            </script>   
   
   
   
   

  
<script runat="server">
var seconds = 30;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
		 window.location="winner.php";
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);
</script>
    
    
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>GO LIVE AND BID SMARTER</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />

</head>
<body style="font-family:Verdana">
  <div class="container">
<div class="row " style="padding-top:20px;">
    <h3 class="text-center" >GO LIVE AND BID SMARTER </h3>
        <div  id='cssmenu' align="right">
<ul style="align-items:flex-end">
   <li class='active'><a href='#'>Live Bidding</a></li>
   <li><a href='setproxy.php'>Set Proxy</a></li>
   <li><a href='#'>Chit Details</a></li>
   <li><a href='#'>Contact Admin</a></li>
   <li><a href='#'>Pay Now</a></li>
   <li><a href='exitbid.php?id=<?php echo $uname ?>'>Exit Bidding</a></li></ul>
   
   <div align="center" style="font-size:36px"><span  id="countdown" class="timer"></span></div>
<div align="right" ></div>
</div>
    </br>
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                RECENT BIDDINGS
            </div>
            <div id="xyz" class="panel-body" style="overflow:scroll; height:300px;">
            </div>
            <div class="panel-footer">
                <div class="input-group">
                                <form action="" method="post">
                                     <span class="input-group-btn"><input type="number" class="form-control" name="msg" placeholder="Enter Amount here" />
                                   <button type="submit" name="submit" class="btn btn-info" onClick="secondPassed()"/>Bid</button>
                                       </span> </form>
                                         </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
               ONLINE BIDDERS
            </div>
            <div class="panel-body" style="overflow:scroll; height:300px;">
                <ul class="media-list">

 

                    <li class="media">

                                        <div class="media-body">

                                            <div class="media">

<?php
$i=2;
$sql=mysql_query("select * from details where status='a' group by uname ")	;
while($r=mysql_fetch_array($sql,MYSQL_ASSOC))
{
$uname=$r["uname"];
$id=$r["id"];
$sql=mysql_query("select * from livebid where uname='$uname' group by uname ")	;
while($r=mysql_fetch_array($sql,MYSQL_ASSOC))
{
$bidamt=$r["bidamt"];
$biddate=$r["biddate"];
$bidtime=$r["bidtime"];
$i=$i+1;
?>
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.gif" ></img>
                                                </a>
     
                                                <div class="media-body" >
                                                    <h5><?php echo"$uname"; ?> </h5>
                                                    
                                                   <small class="text-muted">Active</small>
                                                </div>
                                                <?php }} ?>
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