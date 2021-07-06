<?php
session_start();
error_reporting(0);
include("dbconnection.php");
include("checklogin.php");
check_login();
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mobile=$_POST['phone'];
	$gender=$_POST['gender'];
	$query=mysqli_query($con,"select email from user where email='$email'");
	$num=mysqli_fetch_array($query);
	if($num>1)
	{
	$_SESSION['msg']="البريد الإلكتروني موجود مسبقاً , اد نسيت كلمة المرور الرجاء الضغط علي الخيار";	
	}
	else
	{
 mysqli_query($con,"insert into user(name,email,password,mobile,gender,status) values('$name','$email','$password','$mobile','$gender','0')");
	$_SESSION['msg']="تم التسجيل بنجاح";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CRM | تسجيل المستخدمين يدوياً</title>
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
	  <script type="text/javascript">
function emailcheck1(str) 
    {
	    var at="@"
	    var dot="."
	    var lat=str.indexOf(at)
	    var lstr=str.length
	    var ldot=str.indexOf(dot)
	    if (str.indexOf(at)==-1)
	    {	   
	       return false;
	    }

	    if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
	    {	   
	       return false;
	    }

	    if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
	    {	    
	        return false;
	    }

        if (str.indexOf(at,(lat+1))!=-1)
        {	    
            return false;
        }

	    if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
	    {	    
	        return false;
	    }

	    if (str.indexOf(dot,(lat+2))==-1)
	    {	    
	        return false;
	    }
    	
	    if (str.indexOf(" ")!=-1)
	    {	    
	        return false;
	    }
	     return true;					
    }

	function validation12()
    {      
     var flag=0; 
		   if(document.getElementById('name').value=="")
            {
            document.getElementById('errname').innerHTML="*حقل اسم فارغ.";
            flag=1;
            document.getElementById('errname').style.display="block";
            }
            else
            {
            document.getElementById('errname').style.display="none";
            }   
			
			if(emailcheck1(document.getElementById('email').value)== false)
            {
             document.getElementById('vldt').innerHTML="*ادخل البريد الإلكتروني.";
            flag=1;
            document.getElementById('vldt').style.display="block";
            }
            else
            {
            document.getElementById('vldt').style.display="none";
            } 
			
			 if(document.getElementById('password').value=="")
            {
            document.getElementById('pwd').innerHTML="*حقل الرقم السري فارغ.";
            flag=1;
            document.getElementById('pwd').style.display="block";
            }
            else
            {
            document.getElementById('pwd').style.display="none";
            } 
			 if(document.getElementById('cpassword').value=="")
            {
            document.getElementById('cpwd').innerHTML="*تأكيد كلمة المرور فارغة.";
            flag=1;
            document.getElementById('cpwd').style.display="block";
            }
            else
            {
            document.getElementById('cpwd').style.display="none";
            } 
			
			 if(document.getElementById('cpassword').value!=document.getElementById('password').value)
            {
            document.getElementById('mpwd').innerHTML="*الرقم السري او تأكيد الرقم السري غير متطابقين";
            flag=1;
            document.getElementById('mpwd').style.display="block";
            }
            else
            {
            document.getElementById('mpwd').style.display="none";
            } 
			
			if(document.getElementById('phone').value.length<10)
            {
            document.getElementById('mb').innerHTML="*ادخل رقم هاتف يحتوي علي 10 خانات .";
            flag=1;
            document.getElementById('mb').style.display="block";
            }
            else
            {
            document.getElementById('mb').style.display="none";
            }
		
			  
        if(flag==1)
        {
            return false;
        }        
        return true;
    }  

	function numbersonly(e)
    {
     var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){

    if(unicode<48||unicode>57)
    return false
    }
    }
	
</script>

</head>
<body class="error-body no-top" dir="rtl">
<div class="container" dir="rtl">
  <div class="row login-container column-seperation">  
 
        <div class="col-md-12 "> <br>
        <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
		 <form id="validate"  class="login-form" action="" method="post">
		 <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">الإسم</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="name" id="name" class="form-control">                                 
				</div>
                <span class="help-block"><div style="color:#F00;" id="errname"></div></span>
            </div>
          </div>
          </div>
           <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">البريد الإلكتروني</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="email" id="email" class="form-control">                                 
				</div>
                <span class="help-block"><div style="color:#F00;" id="vldt"></div></span>
            </div>
          </div>
          </div>
           <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">الرقم السري </label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="password" id="password" class="form-control">                                 
				</div>
                <span class="help-block">     <div style="color:#F00;" id="pwd"></div>  	</span>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">تأكيد الرقم السري</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="cpassword" id="cpassword" class="form-control">                                 
				</div>
                <span class="help-block">  <div style="color:#F00;" id="cpwd"></div>
         <div style="color:#F00;" id="mpwd"></div></span>
            </div>
          </div>
          </div>
          <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">رقم الهاتف </label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="phone" id="txtpassword" class="form-control">                                 
				</div>
                
                                            <span class="help-block"> <div style="color:#F00;" id="mb"></div></span>
            </div>
          </div>
          </div>
          <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">الجنس</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="radio" value="m" name="gender" checked > ذكر
                                              <input type="radio" value="f" name="gender" > أنثى
                                
				</div>
            </div>
          </div>
          </div>
         <div class="row">
            <div class="col-md-10">
              <input onClick="return validation12();"  class="btn btn-primary btn-cons pull-right" name="submit" value="ارسال" type="submit" />
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