<?php   
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();
if (isset($_GET['type'])) {
    $typeVal= $_GET['type'];
    $ReqID = $_GET['id'];

    switch ($typeVal) {
        case 1:
            //$message = "";
            $pre_params =mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM prequest  WHERE id=".$ReqID)) ;
            $name = $pre_params['name'];
            $email = $pre_params['email'];
            $contactno = $pre_params['contactno'];
            $company = $pre_params['company'];
            $stutes = "";
            $remark = $pre_params['remark'];
            $other = "";
            echo "yooooooooooooooooooooooooooooooooooooooooo".$pre_params['status'];
            if ($pre_params['others']== 1) {
              $other = $pre_params['query'];
          } 
            switch ($pre_params['status']) {
                case 1:
                    $stutes= 'جديد';
                  break;
                case 2:
                    $stutes=  'تمت الإجابة';
                  break;
                case 3:
                    $stutes=  'لم تتم الإجابة';
                  break;
                default:
                  # code...
                  break;
              }
            $servicess= mysqli_query(
                $con," SELECT service.name , service.status FROM service_prequest
                 LEFT OUTER JOIN service ON service_prequest.service_id = 
                 service.id WHERE service_prequest.request_id = ". $ReqID );
            $servicessRequested="";
            $counter = 0;
            
              
            
             while($row=mysqli_fetch_array($servicess))
                          { $counter ++;
                            $status="";
                            if ( $row["status"] != 1) {
                              $status="غير فعالة";
                            }else
                            {
                              $status=" فعالة";
                            }
                            $servicessRequested .=  "
                            <tr style='font-size:18px;line-height:20px;font-weight:bold;'> 
                            <td>".$counter."</td>
                            <td>".$row["name"]."</td>
                            <td>".$status. "</td>
                            </tr>"
                            
                            ;
                        }
              
            $titleMessage="-:لقد أرسلت الينا طلب إستفسار عن خدمات بإستخدام <br /> البريد الإلكتروني التالي  
            <span style='text-decoration:underline;font-weight:bold;'>
             " . $email. 
              "</span> <br /> 
              إسم الشركة :
            <span style='text-decoration:underline;font-weight:bold;'>
            " . $company. 
            "</span> <br />
            رقم الهاتف:
            <span style='text-decoration:underline;font-weight:bold;'>
            " . $contactno.
             "</span> 
            .<br>";
            $detailMessage="نرغب في اخطارك , بأنه تم تحديث حالة طلبك الي  
            :<span style='text-decoration:underline;font-weight:bold;' >
            ".$stutes."</span> <br />
            و رد ادارة النظام كان :
            <span style='text-decoration:underline;font-weight:bold;'> 
            
            ".$remark."
            </span>"  
            ;
            $servicessTable='<table dir="rtl" style="background:white;" class="table"> 
            
            <tr style="font-size:24px;line-height:28px;font-weight:bold;">
            <td>
                        رقم
            </td>
            <td>
                        اسم الخدمة
            </td>
            <td>
                        حالة الخدمة ( متوفرة او لا )
            </td>
            
            </tr>
            '. $servicessRequested .' </table>';
            $smallMsg = "prequest answered";
            //mail($pre_params['email'], 'Your Request has been viwed ', $message , "From: $email");
            echo "<script>alert('type = $typeVal <br> Email :$email ');</script>";
            break;
        case 2:
            $titleMessage = "ticket ok";
            $detailMessage="نرغب في اخطارك , بأنه تم تحديث حالة طلبك الي  
            <span style='text-decoration:underline;font-weight:bold;'>
            ".$stutes."</span>"  
            ;
            break;
        default:
            # code...
            break;
    }


}
$messaGE = '
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <title></title>
  <!--[if mso]>
  <style>
    table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
    div, td {padding:0;}
    div {margin:0 !important;}
  </style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {
      font-family: Arial, sans-serif;
    }
    @media screen and (max-width: 530px) {
      .unsub {
        display: block;
        padding: 8px;
        margin-top: 14px;
        border-radius: 6px;
        background-color: #555555;
        text-decoration: none !important;
        font-weight: bold;
      }
      .col-lge {
        max-width: 100% !important;
      }
    }
    @media screen and (min-width: 531px) {
      .col-sml {
        max-width: 27% !important;
      }
      .col-lge {
        max-width: 73% !important;
      }
    }
  </style>
</head>
<body style="margin:0;padding:0;word-spacing:normal;background-color:#939297;">
  <div role="article" aria-roledescription="email" lang="ar" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;">
    <table role="presentation" dir="rtl" style="width:100%;border:none;border-spacing:0;">
      <tr>
        <td align="center" style="padding:0;">
          <!--[if mso]>
          <table role="presentation" align="center" style="width:600px;">
          <tr>
          <td>
          <![endif]-->
          <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
            <tr>
              <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                <a href="http://alwasata.ly" style="text-decoration:none;"><img src="https://i.ibb.co/rk462sS/Logo.png" width="165" alt="Logo" style="width:80%;max-width:165px;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
              </td>
            </tr>
            
            <tr>
              <td align="right" style="padding:30px;background-color:#ffffff;">
                <h1  style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">مرحباً السيد/ة '.$name.'</h1>
                <p style="margin:0;"> '.$titleMessage.'</p>
              </td>
            </tr>
            <tr>
            
              <td align="right" style="padding:16px;background-color:white;font-size:24px;line-height:28px;font-weight:bold;">
              <p  dir="rtl" style="padding:30px ;background-color:white;" align="right">الخدمات المطلوبة</p>
              '.$servicessTable.'
              '.$other = "" ? "" : " خدمات أخرى ".$other.'
              </td>
              
            </tr>
            <tr>
              <td style="padding:35px 30px 11px 30px;font-size:0;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                <!--[if mso]>
                <table role="presentation" width="100%">
                <tr>
                <td style="width:145px;" align="left" valign="top">
                <![endif]-->
                <div class="col-sml" style="display:inline-block;width:100%;max-width:145px;vertical-align:top;text-align:left;font-family:Arial,sans-serif;font-size:14px;color:#363636;">
                  <img src="https://assets.codepen.io/210284/icon.png" width="115" alt="" style="width:80%;max-width:115px;margin-bottom:20px;">
                </div>
                <!--[if mso]>
                </td>
                <td style="width:395px;padding-bottom:20px;" valign="top">
                <![endif]-->
                <div align="right" class="col-lge" style="display:inline-block;width:100%;max-width:395px;vertical-align:top;padding-bottom:20px;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                  <p dir="rtl" style="margin-top:0;margin-bottom:12px;">
                  '.$detailMessage.'
                  .</p>
                 
                </div>
                <!--[if mso]>
                </td>
                </tr>
                </table>
                <![endif]-->
              </td>
            </tr>
            <tr>
              <td style="padding:30px;font-size:24px;line-height:28px;font-weight:bold;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                <a href="http://www.example.com/" style="text-decoration:none;"><img src="https://assets.codepen.io/210284/1200x800-1.png" width="540" alt="" style="width:100%;height:auto;border:none;text-decoration:none;color:#363636;"></a>
              </td>
            </tr>

              <td style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">
                <p style="margin:0 0 8px 0;"><a href="http://www.facebook.com/" style="text-decoration:none;"><img src="https://assets.codepen.io/210284/facebook_1.png" width="40" height="40" alt="f" style="display:inline-block;color:#cccccc;"></a> <a href="http://www.twitter.com/" style="text-decoration:none;"><img src="https://assets.codepen.io/210284/twitter_1.png" width="40" height="40" alt="t" style="display:inline-block;color:#cccccc;"></a></p>
                <p style="margin:0;font-size:14px;line-height:20px;">&reg; Alwasata Co 2021<br></p>
              </td>
            </tr>
          </table>
          <!--[if mso]>
          </td>
          </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
    </table>
     
  </div>
</body>
</html>
 ';
 $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@acadimia.ly>' . "\r\n";
mail($email , "test for automatic Replay", $messaGE ,$headers );
header("Location: ./home.php?mesg=su");
	exit();
?>