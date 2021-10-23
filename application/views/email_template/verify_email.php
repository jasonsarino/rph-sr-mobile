<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=$system_title . ' - Verify Email Address'?></title>
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
            <p><strong>Hi <?=$this->input->post('firstname')?></strong>,</p>
            <p><?=$this->lang->line('email_templates_text_11')?> <strong><?=$this->input->post('email')?></strong>. <?=$this->lang->line('email_templates_text_12')?></p>
            <p style="margin-top:30px;"><a href='<?=base_url('register/confirm_email/' . $confirmLink)?>' style="text-decoration:none;border-radius: 4px; padding:10px; font-size: 16px; color:#FFF; background:#578ebe; border-color: #578ebe; ">Confirm Email</a></p>
            <p><?=$this->lang->line('email_templates_text_03')?></p>
            <div style="background:#ECF8FF; padding:10px;"><a href='<?=base_url('register/confirm_email/' . $confirmLink)?>' style="color:#2ba6cb; text-decoration:none;"><?=base_url('register/confirm_email/' . $confirmLink)?></a></div>
            <p><?=$this->lang->line('common_text_11')?>.</p>

            <div style="font-size:12px; margin-top:30px; dispaly:block; font-style:italic;"><?=$this->lang->line('common_text_12')?></div>
      </div>
      <div style="border-top: 1px solid #EEE; padding: 25px;">
            <?=$footer_title?>
      </div>
</div>
</body>
</html>