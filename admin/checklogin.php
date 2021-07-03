<?php

function check_login()
{
	include("dbconnection.php");
if(!isset($_SESSION['id']))
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";		
		$_SESSION["login"]="";
		$val3 =date("Y/m/d");
		date_default_timezone_set("Asia/Calcutta");
		$time=date("h:i:sa");
		$tim = $time;
		$ip_address=$_SERVER['REMOTE_ADDR'];
		$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
		$addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 
		$city = $addrDetailsArr['geoplugin_city']; 
		$country = $addrDetailsArr['geoplugin_countryName'];
		ob_start();
		system('ipconfig /all');
		$mycom=ob_get_contents();
		ob_clean();
		$findme = "Physical";
		$pmac = strpos($mycom, $findme);
		$mac=substr($mycom,($pmac+36),17);
		//print_r($con);
		//echo $val3." ".$tim."  ".$ip_address." ".$mac." ".$city." ".$country;
		try {
			$ret=mysqli_query($con,"insert into usercheck(`logindate`,`logintime`,`user_id`,`username`,`email`,`ip`,`mac`,`city`,`country`)
		 values('".$val3."','".$tim."',0,'not authorised','not authorised','".$ip_address."','".$mac."','".$city."','".$country."')");
		//echo $ret;
		} catch (\Throwable $th) {
			echo $th;
		}
		
		//die("not logged in");
		header("Location: http://$host$uri/");
	}
}
?>