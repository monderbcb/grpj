<?php
session_start();
error_reporting(true);
include("dbconnection.php");
if(isset($_POST['login']))
{
$ret=mysqli_query($con,"SELECT * FROM user WHERE name='".$_POST['email']."' and password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$num['email'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['name'];
$sqlInsert = "
    INSERT INTO chat_login_details (userid) 
    VALUES (".$num['id'].")";
  mysqli_query($con, $sqlInsert);
  $lastInsertId = mysqli_insert_id($con);
  $_SESSION['login_details_id'] = $lastInsertId;
$sqlUserUpdate = "
			UPDATE user 
			SET online = 1 
			WHERE id = '".$num['id']."'";			
		mysqli_query($con, $sqlUserUpdate);	
$val3 =date("Y/m/d");
date_default_timezone_set("Libya/Tripoli");
$time=date("h:i:sa");
$tim = $time;
$ip_address=$_SERVER['REMOTE_ADDR'];
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 
$city = $addrDetailsArr['geoplugin_city']; 
$_SESSION['addr']=$addrDetailsArr;
$country = $addrDetailsArr['geoplugin_countryName'];
ob_start();
system('ipconfig /all');
$mycom=ob_get_contents();
ob_clean();
$findme = "Physical";
$pmac = strpos($mycom, $findme);
$mac=substr($mycom,($pmac+36),17);
$ret=mysqli_query($con,"insert into usercheck(logindate,logintime,user_id,username,email,ip,mac,city,country)values('".$val3."','".$tim."','".$_SESSION['id']."','".$_SESSION['name']."','".$_SESSION['login']."','$ip_address','$mac','$city','$country')");

$extra="change-password.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="خطاء في اسم المستخدم او الرقم السري";
$extra="index.php";

echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CRM | تسجيل الدخول</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>

</head>
<body class="error-body no-top">
<div class="container">
  <div class="row login-container column-seperation">  
        <div class="col-md-5 col-md-offset-1">
          <h2>تسجيل الدخول لنظام ادارة العملاء</h2>
          <br>
          <h2>
            <a href="./get-quote.php">الإستفسار عن الخدمات</a>
		   </h2>
        </div>
        <div class="col-md-5 "> <br>
             <p style="color:#F00"><?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
		 <form id="login-form" class="login-form" action="" method="post">
		 <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">اسم المستخدم</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="email" id="txtusername" class="form-control">                                 
				</div>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">الرقم السري</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="password" id="txtpassword" class="form-control">                                 
				</div>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="control-group  col-md-10">
            <div class="checkbox checkbox check-success"> <a href="forgot-password.php">نسيت كلمة المرور </a>&nbsp;&nbsp;
         </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <button class="btn btn-primary btn-cons pull-right" name="login" type="submit">تسجيل الدخول</button>
            </div>
          </div>
		  </form>
        </div>
     
    
  </div>
</div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/js/login.js" type="text/javascript"></script>
</body>
</html>