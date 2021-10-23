<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Aspen Development Corpotation - Forgot Password</title>
<meta name="viewport" content="width=device-width"/>
</head>
<body style="background:#eef1f5; padding:25px; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:14px; color:#333; ">
<div style="width: 75%; margin-left:auto; margin-right:auto; box-shadow: 0 2px 3px 2px rgba(0,0,0,.03) !important; background:#fff; border-radius: 6px;">
      <div style="padding:25px;">
            <p><strong>Hi <?=$fullname?></strong>,</p>
            <p>Welcome to Heemah website. Please check your account credentials below.</p>
            <p>Mobile Number: <?=$mobile_number?></p>
            <p>Password: <?=$password?></p>
            <p>Click <a href="<?=base_url()?>">here</a> to login.</p>

            <div style="font-size:12px; margin-top:30px; dispaly:block; font-style:italic;"><?=$this->lang->line('common_text_12')?></div>
      </div>
      <div style="border-top: 1px solid #EEE; padding: 25px;">
            <?=$footer_title?>
      </div>
</div>
</body>
</html>