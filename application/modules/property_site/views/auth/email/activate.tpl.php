<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Email from ipapa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style type="text/css">
  body
    {
       font-size: 16px !important;
       color: #000 !important;
       font-family: 'Roboto' !important;
    }
</style>
</head>
<body style="margin: 0; padding: 0;">
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td>
     <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
       <tr>
         <td align="center" style="padding: 0px 0 0px 0;">
          <img src="http://ipapa.co.id/assets/ipapa/images/email_header.gif" alt="header" style="display: block;" />
         </td>
       </tr>
       <tr><td style="height:5px;" bgcolor="#fff"> </td></tr>
       <tr>
         <td>
           <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
             <td bgcolor="#eeeeef" >
              <center><h1>Welcome to IPAPA</h1></center>
             </td>
            </tr>
            <tr>
             <td bgcolor="#fff" style="padding: 20px 0 30px 0;">
              <center>
	          Your Email : <?php echo $identity;?><br>
             <br><br>
              Please click the button below to activate your account and begin using Ipapa services!
              <p><a href="<?php echo  base_url('auth/activate/'. $id .'/'. $activation);?>"><img src="http://ipapa.co.id/assets/ipapa/images/button_activate.gif" alt="Button Link Activation" ></a></p>
              </center>
             </td>
            </tr>
            <tr>
             <td style="padding-top: 10px;" bgcolor="#eeeeef" >
              <center>Thank you for registering IPAPA, read user manual first and you will enjoy our system.<br>
                If the link is broken, Please download the PDF file from directly : http://www.ipapa.co.id/download/manual.pdf</center>
             </td>
            </tr>
            <tr>
              <td style="padding:80px 15px 0px 0;" bgcolor="#eeeeef" align="right">
                <p style="padding-right:30px;">Best Regards</p><br>
                <p>Ipapa Development Team</p></td>
            </tr> 
           
            </tr>
           </table>
         </td>
       </tr>
       <tr>
        <td  align="center">
          <img src="http://ipapa.co.id/assets/ipapa/images/email_footer.gif" alt="header" style="display: block;" />
        </td>
       </tr>
        <tr>
         <td width="740px"><center><p style="font-size:10px;">Bellagio Mall Kav.E4.3 UG Floor Unit 17-18 Jl. Mega Kuningan Barat, Setiabudi, South Jakarta | (+62) 21 300 66 511 | <a href="mailto:info@ipapa.coid">info@ipapa.co.id</a> | <a href="http://www.ipapa.co.id">http://www.ipapa.co.id</a></p></center></td>
       </tr>
     </table>
   </td>
  </tr>
 </table>
</body>
</html>