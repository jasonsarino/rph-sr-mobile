<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Amaalah Website</title>
<meta name="viewport" content="width=device-width"/>
</head>
<body style="background:#eef1f5; padding:25px; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:14px; color:#333; ">
<div style="width: 99%; margin-left:auto; margin-right:auto; box-shadow: 0 2px 3px 2px rgba(0,0,0,.03) !important; background:#fff; border-radius: 6px;">
      <div style="border-bottom: 1px solid #EEE; padding:25px; ">
            <h2><?=$this->lang->line("email_template_text001")?></h2>
      </div>
      <div style="padding:25px;">
            <p><strong><?=$this->lang->line("email_template_text002")?> <?=$agency_name?></strong>,</p>
            <p>Your subscription is approved by the management , you can use Amaalah feature now .</p>

            <div style="font-size:12px; margin-top:30px; dispaly:block; font-style:italic;"><?=$this->lang->line("email_template_text006")?></div>
      </div>
      <div style="border-top: 1px solid #EEE; padding: 25px;">
            <?=date('Y')?> <?=$this->lang->line("email_template_text001")?>
      </div>
</div>
</body>
</html>