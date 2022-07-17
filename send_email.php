<?php
if(!empty($_POST['sub_email'])){

    $email=$_POST['sub_email'];
    $name=$_POST['fname'].' '.$_POST['lname'];
    $phone=$_POST['phone'];
    $to = "info@lyna-carrental.Com";
   // $to = "hsingh@sdlcinfotech.com";



$subject = "Lyna-CarRental.Com subscription request";

echo $message = "
<p style='font-style: normal !important;font-family: Rubik, sans-serif !important;'>Subscriber Details J:</p>
<table>
<tr>
<td style='text-align:left;font-style: normal !important;font-family: 'Rubik', sans-serif !important;'>Name:</td>
<td style='text-align:left;font-style: normal !important;font-family: 'Rubik', sans-serif !important;'>$name</td>
</tr>
<tr>
<td style='text-align:left;font-style: normal !important;font-family: 'Rubik', sans-serif !important;'>Tel. No.:</td>
<td style='text-align:left;'>$phone</td>
</tr>
<tr>
<td style='text-align:left;font-style: normal !important;font-family: 'Rubik', sans-serif !important;'>E-mail:</th>
<td style='text-align:left;font-style: normal !important;font-family: 'Rubik', sans-serif !important;'>$email</td>
</tr>



</table>";


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <lyna-carrental.com>' . "\r\n";

mail($to,$subject,$message,$headers);

}


?>