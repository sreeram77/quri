<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
session_start();
include("../sql.php");
?>

<?php


if(isset($_POST["submit"]))
{
$cname=$_POST["cname"];
$cemail=$_POST["cemail"];
$cid=$_POST["cid"];
$cdesc=$_POST["cdesc"];
$camt=$_POST["camt"];
$caddress=$_POST["caddress"];
$cphone=$_POST["cphone"];

$status="n";
$cdate=date("Y-m-d h:i:sa");


if($cname == "" || $cemail == "" || $cid == "" || $cphone == "" || $cdesc == "" || $caddress == ""|| $camt == ""  )
	{
			echo "<br/>";echo "<br/>";echo "<br/>";
		echo "Please fill up all the details.";
		echo "<br/>";
	}
	else
	{  $regexp = "/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/i";
      // Validate the syntax 
		if(!preg_match($regexp, $cemail))
		{
			echo "<br/>";
			echo "Email address entered is not valid.";
			echo "</br>";
			echo "Please enter a correct email address";
			
		}
		else 
		{
			
$sql=mysql_query("INSERT INTO `chits` (`cname`, `cemail`, `cid`, `camt`, `caddress`, `cphone`, `cdesc`, `cdate`, `status`) VALUES ('$cname', '$cemail', '$cid', '$camt', '$caddress', '$cphone', '$cdesc', '$cdate', '$status')");
		
			if(!$sql)
			{
			
				$_SESSION["msg"]= "<h1 style='color:#FF0000'>FAILED...!!!</h1>";
				
			}
				else
			{
					
				$_SESSION["msg"]= "<h1 style='color:#FFF;text-align: center;'>Thank You For registring </h1>";  
				header('location:../hscreen/index.php');
			
			}
			
			
		}
	}
}
?>




<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Create New Group</title>
		<meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
		<meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-skin-boxes.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>Create New Chit Group</h1>
					<div class="codrops-top">
						<a class="codrops-icon codrops-icon-prev" href="../hscreen/index.php"><span>Previous Page</span></a>
						
						<a class="codrops-icon codrops-icon-info" href="#"><span>Enter your New Chit Group Details</span></a>
					</div>
				</div>
				<form id="myform" class="fs-form fs-form-full" autocomplete="off" method="post">
					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">What's your Chit name?</label>
							<input class="fs-anim-lower" id="q1" name="cname" type="text" placeholder="abcd" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="We won't send you spam, we promise...">What's your email address?</label>
							<input class="fs-anim-lower" id="q2" name="cemail" type="email" placeholder="example@example.com" required/>
						</li>
                        <li>
							<label class="fs-field-label fs-anim-upper" for="q5">What's your Registered Chit ID ?</label>
							<input class=" fs-anim-lower" id="q5" name="cid" type="text" placeholder="your chit ID"/>
						</li>
					<!--	<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" for="q3" data-info="This will help us know what kind of service you need">What's your priority for your new website?</label>
							<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
								<span><input id="q3b" name="q3" type="radio" value="conversion"/><label for="q3b" class="radio-conversion">Sell things</label></span>
								<span><input id="q3c" name="q3" type="radio" value="social"/><label for="q3c" class="radio-social">Become famous</label></span>
								<span><input id="q3a" name="q3" type="radio" value="mobile"/><label for="q3a" class="radio-mobile">Mobile market</label></span>
							</div>
						</li>
						<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" data-info="We'll make sure to use it all over">Choose a color for your website.</label>
							<select class="cs-select cs-skin-boxes fs-anim-lower">
								<option value="" disabled selected>Pick a color</option>
								<option value="#588c75" data-class="color-588c75">#588c75</option>
								<option value="#b0c47f" data-class="color-b0c47f">#b0c47f</option>
								
							</select>
						</li> -->
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Describe the type and behaviour of your chiti</label>
							<textarea class="fs-anim-lower" id="q4" name="cdesc" placeholder="Describe here"></textarea>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q5">What will be your chiti amount ?</label>
							<input class="fs-mark fs-anim-lower" id="q5" name="camt" type="number" placeholder="0000"/>
						</li>
                        <li>
							<label class="fs-field-label fs-anim-upper" for="q5">What's your contact address ?</label>
							<textarea class="fs-anim-lower" id="q5" name="caddress" type="text" placeholder="your address here"></textarea>
						</li>
                        <li>
							<label class="fs-field-label fs-anim-upper" for="q5">What's your phone number ?</label>
							<input class="fs-anim-lower" id="q5" name="cphone" type="number" placeholder="1234567890" />
						</li>
					</ol><!-- /fs-fields -->
					<button class="fs-submit" type="submit" name="submit" value="submit" onClick="myFunction()">submit Details for Verification</button>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->

			

		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<script src="js/fullscreenForm.js"></script>
        <p id="demo"></p>

		<script>
				function myFunction() {
   				 var x;
    			if (confirm("Your Details are submitted for verification purpose.You can start adding your clients after the approval of your new group.
				Thank You.") == true) {
 						x=10;
						<?php
						header('location:../hscreen/index.php');

						?>
    			} 
    			document.getElementById("demo").innerHTML = x;
			}
</script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>
	</body>
</html>