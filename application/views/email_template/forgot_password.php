<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>RCD PEARL HOMES REALTY INC.</title>
<meta name="viewport" content="width=device-width"/>
</head>
<body style="background:#eef1f5; padding:25px; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:14px; color:#333; ">
<center><img src="<?=base_url('assets/images/logo/rcd-logo.png')?>" style="height:110px;"></center>
<div style="width: 75%; margin-left:auto; margin-right:auto; box-shadow: 0 2px 3px 2px rgba(0,0,0,.03) !important; background:#fff; border-radius: 6px;">
      <div style="padding:25px;">
            <p><strong>Hi <?=$firstname?></strong>,</p>
            <p>You recently requested to reset your password for your RPH Account.Click the button below to reset your password.</p>

            <p style="margin-top:30px;"><center><a href='<?=base_url('forgot_password/password/' . $urltoken)?>' style="text-decoration:none;border-radius: 4px; padding:10px; font-size: 16px; color:#FFF; background:#578ebe; border-color: #578ebe; ">Reset your Password</a></center></p>
            
            <p>If you're having trouble clicking the password reset button, copy and paste the URL below into your web browser.</p>
            <div style="background:#ECF8FF; padding:10px;"><a href='<?=base_url('forgot_password/password/' . $urltoken)?>' style="color:#2ba6cb; text-decoration:none;"><?=base_url('forgot_password/password/' . $urltoken)?></a></div>

            <p style="margin-top:30px;">If you did not request a password reset, please ignore this email.</p>
            
            <p>Thank you</p>
            <div style="font-size:12px; margin-top:30px; dispaly:block; font-style:italic;"><?=$this->lang->line('common_text_12')?></div>
      </div>
      <div style="border-top: 1px solid #EEE; padding: 25px;">
            <?php echo date('Y') . " &copy; RCD PEARL HOMES REALTY INC.";?>
      </div>
</div>
</body>
</html>