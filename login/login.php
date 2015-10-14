
<?php
session_start();
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
$uname=$_POST["uname"];
$upass=$_POST["upass"];
$status="a";

//echo "$uname-------$upass-----$status";




$f=0;
$s=mysql_query("select * from details where uname='$uname' and upass='$upass'")	;
$num=mysql_num_rows($s);
if( $num > 0)
{	
	$f=1;
	$_SESSION["uname"]=$uname;
	$_SESSION["upa"]=$upass;
	echo $uname;
	
		header('location:../hscreen/index.html');
	
}

else
{
		echo "<h2>failed</h2>";
}

}
?>


<?php


if(isset($_POST["signup"]))
{
$uname=$_POST["uname"];
$upass=$_POST["upass"];
$ucpass=$_POST["ucpass"];
$uemail=$_POST["uemail"];
$uphone=$_POST["uphone"];
$status="a";
$date=date("Y-m-d h:i:sa");

if($upass==$ucpass)
{
	//echo "$uname-------$upass-----$status-----$uphone----$date";





if($uname == "" || $upass == "" || $uemail == "" || $uphone == "" || $ucpass == "" )
	{
			echo "<br/>";echo "<br/>";echo "<br/>";
		echo "Please fill up all the details.";
		echo "<br/>";
	}
	else
	{  $regexp = "/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/i";
      // Validate the syntax 
		if(!preg_match($regexp, $uemail))
		{
			echo "<br/>";
			echo "Email address entered is not valid.";
			echo "</br>";
			echo "Please enter a correct email address";
			
		}
		else 
		{
			
$sql=mysql_query("insert into details(`uname`,`upass`,`uemail`,`uphone`,`status`,`date`) 	values('$uname','$upass','$uemail','$uphone','$status','$date')");
		
			if(!$sql)
			{
			
				$_SESSION["msg"]= "<h1 style='color:#FF0000'>FAILED...!!!</h1>";
				
			}
				else
			{
					
				$_SESSION["msg"]= "<h1 style='color:#FFF;text-align: center;'>Thank You For registring </h1>";  
				header('location:#tologin');
			
			}
			
			
		}
	}
}
}
?>



<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="../sign-up-login-form/css/normalize.css">

    
        <link rel="stylesheet" href="../sign-up-login-form/css/style.css">

    
    
    
  </head>

  <body>

    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="uname" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="uemail"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="upass"/>
          </div>
           <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="ucpass"/>
          </div>
          <div class="field-wrap">
              <label>
                Phone <span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="uphone" />
            </div>
          
          <button type="submit" name="signup" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="" method="post">
          
            <div class="field-wrap">
            <label>
              User name<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="uname"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="upass"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button type="submit" name="submit" class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="../sign-up-login-form/js/index.js"></script>

    
    
    
  </body>
</html>
