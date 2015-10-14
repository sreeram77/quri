<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
session_start();
include("../sql.php");  
$flag=0; $i=0;
if(isset($_POST['approve']))
{

    if (empty($errors))
    {

		$id=$_SESSION['id'];
        $query="UPDATE `chits` SET `status`='y' WHERE `id`='$id' ";
        $result=mysql_query($query);
        if($result)
        {
            $flag=1; //success
        }
        else
        {
            $flag=2; //failed
        }
    }
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 lt-ie10"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 lt-ie10"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>approve</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="styles/d6220a84.bootstrap.css">

        <!-- Page-specific Plugin CSS: -->
        <link rel="stylesheet" href="styles/vendor/jquery.pnotify.default.css">
        <link rel="stylesheet" href="styles/vendor/select2/select2.css">


        <!-- Proton CSS: -->
        <link rel="stylesheet" href="styles/1b2c4b33.proton.css">
        <link rel="stylesheet" href="styles/vendor/animate.css">

        <!-- adds CSS media query support to IE8   -->
        <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
            <script src="scripts/vendor/respond.min.js"></script>
        <![endif]-->

        <!-- Fonts CSS: -->
        <link rel="stylesheet" href="styles/9a41946e.font-awesome.css" type="text/css" />
        <link rel="stylesheet" href="styles/4d9a7458.font-titillium.css" type="text/css" />

        <!-- Common Scripts: -->
        <script src="scripts/proton/jquery.min.js"></script>
        <script src="scripts/vendor/modernizr.js"></script>
        <script src="scripts/vendor/jquery.cookie.js"></script>
    </head>

    <body class="dashboard-page">
        
        
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        
             
        <section class="wrapper scrollable">
        
            
            <section class="title-bar">
                <div>
                    <span><b style="color:#FFF;">QURI</b></span>
                    <nav class="dashboard-menu">
                        <a href="javascript:;">
                            <i class="icon-cog toggle-widget-setup"></i>
                            <i class="menu-state-icon icon-sort-up"></i>

                            <i class="menu-state-icon icon-caret-down active"></i>
                        </a>
                        <ul>
                            
                            <li><a data-toggle="modal" href="../logout.php">Log Out</a></li>
                            <!--<li><a data-toggle="modal" href="#quickLaunchModal">Remove Quick Launch Icon</a></li>
                            <li><a href="javascript:;">Third Menu Item</a></li>-->
                        </ul>
                    </nav>
                </div>
            </section>
            <nav class="quick-launch-bar">
                <ul>
                    <li>
                        <a href="notices.php">
                            <i class="icon-calendar-empty"></i>
                            <span>Notices</span>
                        </a>
                    </li>
                    <li>
                        <a href="complaints.php">
                            <i class="icon-fire"></i>
                            <span>Complaints</span>
                        </a>
                    </li>
                    <li>
                        <a href="feedback.php">
                            <i class="icon-archive"></i>
                            <span>Feed backs</span>
                        </a>
                    </li>
                    <li>
                        <a href="aprove.php">
                            <i class="icon-barcode"></i>
                            <span>Chit Request</span>
                        </a>
                    </li>
                    
                </ul>
                <!--<a data-toggle="modal" href="#quickLaunchModal" class="add-quick-launch"><i class="icon-plus"></i></a>-->
            </nav>
                    
                    
         
         <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
         <form class="form-horizontal" role="form" action="" method="post">
                    <div class="list-group-item">
                        <h3>Chit Details</h3><br><br>

                         <?php if($flag==1) {
                        echo '<p style="color:green">Success- Chit Approved</p>';  }
                        if($flag==2) {
                        echo '<p style="color:red">Failed!! Try again.</p>';  } ?>

                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;
                            <div style="margin:10px 10px 10px 10px;">
                             <?php
							/*$row=mysql_query("SELECT * FROM `chits` WHERE `status`='n'");
							$row1=mysql_fetch_row($row);*/
							$query="SELECT * FROM `chits` WHERE `status`='n'";
							 $result=mysql_query($query);
							 if($result)
							 {
							 ?> 
                             <table class="table table-striped table-condensed table-bordered table-hover">
                			 <tr>
                			 <td align="center"><b>NAME</b></td>
                 			<td align="center"><b>EMAIL ID</b></td>
                            <td align="center"><b>CHIT ID</b></td>
                 			<td align="center"><b>AMOUNT</b></td>
                            <td align="center"><b>ADDRESS</b></td>
                 			<td align="center"><b>PHONE</b></td>
                            <td align="center"><b>CDESC</b></td>
                 			<td align="center"><b>CDATE</b></td>
                 			</tr>
                             <?php
							
				 			while($item=mysql_fetch_assoc($result))
				 			{
									echo "<tr>";
									echo '<td align="center">';
									echo $item['cname'];
									echo "</td>";
									echo '<td align="center">';
									echo $item['cemail'];
									echo "</td>";
									echo '<td align="center">';
									echo $item['cid'];
									echo "</td>";
									echo '<td align="center">';
									echo $item['camt'];
									echo "</td>";
									echo '<td align="center">';
									echo $item['caddress'];
									echo "</td>";
									echo '<td align="center">';
									echo $item['cphone'];
									echo "</td>";
									echo '<td align="center">';
									echo $item['cdesc'];
									echo "</td>";
									echo '<td align="center">';
									echo $item['cdate'];
									echo "</td>";
									echo "</tr>";
									$_SESSION['id']=$item['id'];
									
							 } ?>
                			 </table>
                             <?php
							 }
							 ?>
                            </div>
                        </div>
                                            
                      <div class="form-group">
                            <input type="submit" class="form-control btn btn-danger" name="approve" value="Approve"/>
                        </div>                          
                                
                    </div>
          </form>
          </div>
         <div class="col-md-2"></div>
         </div>
         <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-6">
          
         
         </div>
         <div class="col-md-3"></div>
         </div>
          
          </section>

        

        
        <script src="scripts/9e25e8e2.bootstrap.min.js"></script>

        <!-- Proton base scripts: -->
        <script src="scripts/3fa227ae.proton.js"></script>


        <!-- Page-specific scripts: -->
        <script src="scripts/proton/jquery-ui.min.js"></script>
        <script src="scripts/proton/73f27b75.dashboard.js"></script>
        <!--<script src="scripts/proton/217183f0.dashdemo.js"></script>-->

        <!-- Bootstrap Tags Input -->
        <!-- http://timschlechter.github.io/bootstrap-tagsinput/examples/ -->
            <script src="scripts/vendor/bootstrap-tagsinput.min.js"></script>

        <!-- Raphael, used for graphs -->
        <!-- http://raphaeljs.com/ -->
            <script src="scripts/vendor/raphael-min.js"></script>
        
        <!-- Morris graphs -->
        <!-- https://github.com/oesmith/morris.js -->
            <script src="scripts/vendor/morris.min.js"></script>

        <!-- Select2 For Bootstrap3 -->
        <!-- https://github.com/fk/select2-bootstrap-css -->
            <script src="scripts/vendor/select2.min.js"></script>
            
        <!-- Number formating for dashboard demo -->
            <script src="scripts/vendor/numeral.min.js"></script>

        <!-- Notifications -->
        <!-- http://pinesframework.org/pnotify/ -->
            <script src="scripts/vendor/jquery.pnotify.min.js"></script>
    </body>
</html>
