<?php
if(isset($_REQUEST['btn-submit'])){
    echo '<script>window.open("https://www.tgcindia.com/wp-content/uploads/2020/11/6-MONTH-Music-production-converted.pdf", "_blank");</script>';
    //here your code to save data
}
?>
<style>
    #nextel_form{ display:none;}
</style>
<?php 

require_once('../../whatsapp_class.php');
$name=trim($_POST['name']);
$phone=trim($_POST['phone']);
$email=trim($_POST['email']);
$whatsapp_obj = new WhatsAppAPI();
$apiResponse = $whatsapp_obj->sendText($country_code = '91', $to_mobile = $phone, $message = 'Thanks for your course interest at TGC INDIA, Please let us know more about your learning requirements?');


// $toaddress='tgcanimation@gmail.com,info@tgcindia.com';
$toaddress='tgcanimation@gmail.com,info@tgcindia.com';
$subject1='Inquiry from TGC New Landing Video Editing';
$mailcontent='Name:'.$name."\n"
.'Email:'.$email."\n"
.'Phone:'.$phone."\n";
$success=mail($toaddress,$subject1,$mailcontent,"From:$email");
// $toaddress3='info@tgcindia.com';
mail($toaddress3,$subject1,$mailcontent,"From:$email");
// $toaddress2='ranjan354@gmail.com';
mail($toaddress2,$subject1,$mailcontent,"From:$email");
include_once('../../config.php');
$query="select email from 'maillist' where email='$email'";
$result=mysqli_query($con,$query);
	$t=date("Y-m-d-H-i");
	$area='Inquiry from TGC Adword';
	$queryinsert= "INSERT INTO `maillist` (name, email, phone, area, date,comments ) VALUES ('$name','$email','$phone','$area','$t','')";
	mysqli_query($con,$queryinsert);
 $nid = mysqli_insert_id();		
 
//  if(isset($_REQUEST['btn-submit'])){
// 	echo '<script>window.open("graphic-pro.pdf");</script>';
// 	}



echo '<script>window.open("https://tgcindia.com/thanks");</script>';
?>
