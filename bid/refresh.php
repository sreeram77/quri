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
?>



<html>
<body>
           <!--  <div class="panel-body" style="overflow:scroll; height:300px;">-->
<ul class="media-list">

                                 
    
     <li class="media">

                                        <div class="media-body">
                                        

                                            <div class="media">
                         <?php
$i=2;
$sql=mysql_query("select * from livebid order by id desc");
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
   
</body>
</html>