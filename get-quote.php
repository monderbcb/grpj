<?php
session_start();
include("dbconnection.php");
// include("checklogin.php"); 
// check_login();    
// error_reporting(0);
$services = mysqli_query($con,"select * from service where status= 1");

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$company=$_POST['company'];
	// $wdd=$_POST['wdnd'];
	// $seo=$_POST['seo'];
	// $swd=$_POST['swd'];
	// $fwd=$_POST['fwd'];
	// $whs=$_POST['whs'];
	// $ed=$_POST['ed'];
	// $opi=$_POST['opi'];
	// $dba=$_POST['dba'];
	// $nd=$_POST['nd'];
	// $cms=$_POST['cms'];
	// $smo=$_POST['smo'];
	// $dwd=$_POST['dwd'];
	// $dr=$_POST['dr'];
	// $wm=$_POST['wm'];
	// $wta=$_POST['wta'];
	// $ld=$_POST['ld'];
	// $osc=$_POST['osc'];
	// $other=$_POST['other'];
	$query=$_POST['query'];
	$pd=date('Y-m-d');
mysqli_query($con,"insert into prequest(name,email,contactno,company,wdd,cms,seo,smo,swd,dwd,fwd,dr,whs,wm,ed,wta,opi,ld,da,osc,nd,others,query,posting_date) values('$name','$email','$contact','$company','$wdd','$cms','$seo','$smo','$swd','$dwd','$fwd','$dr','$whs','$wm','$ed','$wta','$opi','$ld','$dba','$osc','$nd','$other','$query','$pd')");
$_SESSION['msg']="Query Send";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CRM | Request Quote</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
</head>
<body class="">


 
  <a href="#" class="scrollup">Scroll</a>
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-radius no-margin">
		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		
	</div>
	<div class="pull-right">
	</div>
  </div>
  <!-- END SIDEBAR --> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
		<div class="page-title">	
			<h3>Request a Quote</h3>
     
	
             <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="panel panel-default">
                             
                                 <p style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                                <div class="panel-body">
                                    <p>Please click below mention services of your interest to receive quotation for the same:</p>
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                           
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Name </label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="name" class="form-control" required/>
                                                    </div>                                            
                                                
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Contact no</label>
                                                <div class="col-md-9 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="contact" class="form-control" required/>
                                                    </div>            
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group">
                                             <label class="col-md-3 control-label">Service Required :</label>
                                                <div class="col-md-9">                                                                                                                                        
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Website Design & Development" checked="checked"/> Website Design & Development</label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="SEO (Search Engine Optimization)" />SEO (Search Engine Optimization)	</label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Static Website Design" /> Static Website Design</label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Flash Website Development" /> Flash Website Development</label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Web Hosting Services" /> Web Hosting Services</label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service"  value="Ecommerce Development"/> Ecommerce Development</label><br>
                                                 <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Online Payment Integration" /> Online Payment Integration</label><br>
                                                 <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Dash board Application" /> Dash board Application</label><br>
                                                 <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="NewsLetter Design" /> NewsLetter Design</label>
                                                
                                                  
                                                </div>
                                            </div>
                                            
                                          
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="email" name="email" class="form-control datepicker" value="" required>                                            
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            
                                               <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Company</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="company" class="form-control datepicker" value="" required>                                            
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                       
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-9">                                                                                                                                        
                                                 <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="CMS (Content Management System)" />CMS (Content Management System)</label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="SMO (Social Media Optimization)	" />SMO (Social Media Optimization)		</label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Dynamic Website Design" /> Dynamic Website Design</label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Domain Registration" /> Domain Registration </label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Website Maintenance" /> Website Maintenance</label><br>
                                             <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Walk Through Animation" /> Walk Through Animation</label><br>
                                                 <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Logo Design" /> Logo Design</label><br>
                                                 <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Open Source Customization" /> Open Source Customization</label><br>
                                                 <label class="check">
                                             <input type="checkbox" class="icheckbox" name="service" value="Others" /> Others </label>
                                                   
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div style="margin-top:20px;" class="col-md-6">
                                         <div class="form-group">
                                                <label class="col-md-3 control-label">Query</label>
                                                <div class="col-md-9 col-xs-12">                                            
                                                    <textarea class="form-control" rows="5" name="query" required></textarea>
                                                </div>
                                            </div></div>
                                        
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default">Clear Form</button>                                    
                                    <input value="Submit" type="submit" name="submit" class="btn btn-primary pull-right">
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>            
                                    
                                    
                                   
                                   
                                    
                               
                                    
                                    
                                      
             
            	
		</div>
    </div>
  </div>
<!-- BEGIN CHAT --> 

 </div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 

</body>
</html>