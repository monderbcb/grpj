<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();


if(isset($_POST['remark']))
{
	$msg=mysqli_query($con,"update prequest set remark='".$_POST['adminremark']."' , status='2' where id='".$_GET['id']."'");
	if($msg)
	{
		
	header("Location: ./email-template.php?type=1&id=".$_GET['id']);
	exit();
	}
}
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>ادارة النظام  | تفاصيل طلبات الإستفسار</title>
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
<?php include("header.php");?>

<div class="page-container row"> 
  
      <?php include("leftbar.php");?>
    
      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <div class="page-content" dir="rtl"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3></h3>
      </div>
      <div class="modal-body">  </div>
    </div>

    <div class="clearfix"></div>
    <div class="content">                           
     <ul class="breadcrumb">
        <li>   
			<p>الرئيسية<p>  					 							
        </li>     				 
        <li><a href="#" class="active">تفاصيل الطلبات </a></li>                    
    </ul>
   	<div class="page-title">		
		<i class="icon-custom-left"></i>
		<h3>تفاصيل الطلبات</h3>	
	</div>
 	<?php
    $ret=mysqli_query($con,"select * from prequest where id='".$_GET['id']."'");
	$requestID=$_GET['id'];
	while($row=mysqli_fetch_array($ret))
	{
	
	?>
      			<div class="row">
					<div class="col-md-12">
						    <div class="grid simple vertical green">
							<div class="grid-title no-border">
								<h4>-<?php echo $row['name'];?>- تفاصيل  <span class="semi-bold"> الاستفسار </span></h4>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#grid-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="grid-body no-border">
								<div class="row-fluid ">
									    <address class="margin-bottom-20 margin-top-10">
											<strong>الاسم</strong>:
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['name'];?><br>
                                            <strong>البريد الإلكتروني</strong>:
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['email'];?><br>
                                            <strong>رقم الهاتف.</strong>:
											&nbsp;<?php echo $row['contactno'];?><br>
											<strong>الشركة</strong>:
											&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['company'];?><br>
										</address>	
                                        <address class="margin-bottom-20 margin-top-10">
											<strong>الخدمات المطلوبة</strong><br>
											<?php 
											
											if ($row['others']==1) {
												echo "OTHER : ".$row['query'];
											  }
											  $servicess= mysqli_query(
												 $con," SELECT service.name FROM service_prequest
												  LEFT OUTER JOIN service ON service_prequest.service_id = 
												  service.id WHERE service_prequest.request_id = ". $requestID );
						  
											  while($row2=mysqli_fetch_array($servicess))
														   {
														   echo $row2['name'] . "<br>";
														 }
														 ?>
											
											
                  
											
										</address>										 
										<address>
											<strong>التفاصيل</strong><br>
										<?php echo $row['query'];?>
										</address>
                                        <form name="remark" action="" method="post" enctype="multipart/form-data">
                                        <address>
										<strong>تعليق ادارة النظام</strong><br>
											<?php echo $row['remark'];?><br>
											<strong> تعليق جديد</strong><br>
											
										<textarea name="adminremark" cols="70" rows="4"></textarea><br /><br />
                                        <input type="submit" name="remark" value="ارسال" />
										</address>
                                        </form>
								</div>
							</div>
						</div> 
					</div>
				</div>
      			<?php } ?>
				
			
				</div>					
			 </div>			
        </div>    	
	</div> 
  </div>  
  <!-- END PAGE --> 

</div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>	
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>   
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script>  
</body>
</html>