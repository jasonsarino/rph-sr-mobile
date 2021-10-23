<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Aspen Development Corpotation - Forgot Password</title>
<meta name="viewport" content="width=device-width"/>
</head>
<body style="background:#eef1f5; padding:25px; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:14px; color:#333; ">
<div style="width: 75%; margin-left:auto; margin-right:auto; box-shadow: 0 2px 3px 2px rgba(0,0,0,.03) !important; background:#fff; border-radius: 6px;">
      <div style="border-bottom: 1px solid #EEE; padding:25px; ">
            <img src="<?=base_url('assets/images/chillius-online-invoice.png')?>" style="width:200px !important;"/>
            <div style="float:right;">
                  <a href="javascript:;"><img src="<?=base_url('assets/images/social/')?>social_facebook.png" alt="social icon"/></a>
                  <a href="javascript:;"><img src="<?=base_url('assets/images/social/')?>social_twitter.png" alt="social icon"/></a>
                  <a href="javascript:;"><img src="<?=base_url('assets/images/social/')?>social_googleplus.png" alt="social icon"/></a>
                  <a href="javascript:;"><img src="<?=base_url('assets/images/social/')?>social_linkedin.png" alt="social icon"/></a>
            </div>
      </div>
      <div style="padding:25px;">
            <p><strong>Hi <?=$firstname?></strong>,</p>
            <p><?=$this->lang->line('email_templates_text_10')?>.</p>
            <p><?=$this->lang->line('common_text_13')?> <a href="<?=base_url()?>"><?=$this->lang->line('common_text_14')?></a> <?=$this->lang->line('email_templates_text_05')?>.</p>

            <p><?=$this->lang->line('common_text_11')?>.</p>

            <div style="font-size:12px; margin-top:30px; dispaly:block; font-style:italic;"><?=$this->lang->line('common_text_12')?></div>
      </div>
      <div style="border-top: 1px solid #EEE; padding: 25px;">
            <?=$footer_title?>
      </div>
</div>
</body>
</html>