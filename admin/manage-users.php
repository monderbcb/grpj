<?php 
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
if (isset($_POST['del'])){

    $idDeleted = $_POST['delnum'];
    $msg=mysqli_query($con,"select COUNT(id) FROM usercheck WHERE user_id = $idDeleted "); 
    $te=mysqli_fetch_row($msg)[0];
    if ($te == 0 ) {
        $msg2=mysqli_query($con,"UPDATE user SET `status` ='-1' WHERE id = $idDeleted "); 
        echo '
        <script>
        alert (
            "تم حذف المستخدم بنجاح"
        )
        </script>
        ';
    }
    else {
        echo '
        <script>
        alert (
            "لايمكن حذف المستخدم لأن لديه طلبات دعم فني و مراسلات"
        )
        </script>
        ';
    }

}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>الإدارة | ادارة المستخدمين</title>
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
<style>
table th , table td{
    text-align:center;
}
</style>
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
                <div class="modal-body"></div>
            </div>
            <div class="clearfix"></div>
            <div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>الرئيسية</p>
                    </li> 
                    <li><a href="#" class="active">ادارة المستخدمين</a>

                    </li>
                </ul>
                <div class="page-title">	<a href="./home.php">  <i class="icon-custom-left"></i></a>

                    	<h3 >ادارة المستخدمين </h3>
                        <a href="./registration.php" class="fa fa-2x fa-user" aria-hidden="true"> اضافة مستخدم</a>	
                </div>
             
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="grid simple ">
                                    <div class="grid-title no-border">
                                        	<h4>تفاصي المستخدمين</h4>
                                        <div class="tools">	<a href="javascript:;" class="collapse"></a>
											<a href="#grid-config" data-toggle="modal" class="config"></a>
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
                                        </div>
                                    </div>
                                    <div class="grid-body no-border">
                              
                                            <table class="table table-hover no-more-tables" > 
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الإسم بالكامل</th>
                                                        <th>البريد الإلكتروني </th>
                                                        <th>رقم الهاتف</th>
                                                        <th>تاريخ التسجيل</th>
                                                        <th>الحالة</th>
                                                        <th>الخيارات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $ret=mysqli_query($con,"SELECT * FROM user  ORDER BY id asc");
												$cnt=1;
												while($row=mysqli_fetch_array($ret))
												{
													$_SESSION['ids']=$row['id'];
												?>
                                                    <tr>
                                                        <td><?php echo $cnt;?></td>
                                                        <td><?php echo $row['name'];?></td>
                                                        <td><?php echo $row['email'];?></td>
                                                         <td><?php echo $row['mobile'];?></td>
                                                          <td><?php echo $row['posting_date'];?></td>
                                                          <td><?php echo $row['status'] == "-1" ? "محذوف":"فعال" ;?></td>
                                                          <td>
                                                          <form name="abc" action="" method="post">
                                                           <a href="edit-user.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-xs btn-mini">عرض التعديل</a>
                                                           <input type="hidden" name="delnum" value="<?php echo $row['id'];?>" > 
                                                           <input type="submit" name="del" value="Delete" class="btn btn-danger btn-xs btn-mini" 
                                                           onclick="return confirm('هل أنت متأكد من حذف المستخدم ؟')">
                                                           </form>
                                                          </td>
                                                    </tr>
                                                    <?php $cnt=$cnt+1; } ?>
                                                </tbody>
                                            </table>
                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
					</div>
                </div>
            </div>
            <!-- END PAGE -->
        </div>

 </div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK--> 
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<!-- END CORE JS FRAMEWORK --> 
<!-- BEGIN PAGE LEVEL JS --> 	
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS --> 	
<script>
	//Too Small for new file - Helps the to tick all options in the table 
	$('table .checkbox input').click( function() {			
		if($(this).is(':checked')){			
			$(this).parent().parent().parent().toggleClass('row_selected');					
		}
		else{	
		$(this).parent().parent().parent().toggleClass('row_selected');		
		}
	});
	// Demo charts - not required 
	$('.customer-sparkline').each(function () {	
		$(this).sparkline('html', { type:$(this).attr("data-sparkline-type"), barColor:$(this).attr("data-sparkline-color") , enableTagOptions: true  });	
	});
</script>
<!-- BEGIN CORE TEMPLATE JS --> 
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS --> 
</body>

</html>