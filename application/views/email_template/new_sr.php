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
            <p><strong>Hi rcdpearlhomes</strong>,</p>
            <p>New report sales has been submitted.</p>

            <table width="100%" cellpadding="2" cellspacing="2" border="1" style="border-collapse:collapse; border:1px;">
                  <tr>
                        <td><strong>Buyer Name:</strong><br /><?=$srDetails->buyer_name?></td>
                        <td><strong>Reservation Date:</strong><br /><?=date("Y/m/d", strtotime($srDetails->reservation_date))?></td>
                  </tr>
                  <tr>
                        <td><strong>Address:</strong><br /><?=$srDetails->address?></td>
                        <td><strong>Telphone/Cellphone:</strong><br /><?=$srDetails->tel_cell?></td>
                  </tr>
                  <tr>
                        <td><strong>Occupation:</strong><br /><?=$srDetails->occupation?></td>
                        <td><strong>Name of Project:</strong><br /><?=$srDetails->name_of_project?></td>
                  </tr>
                  <tr>
                        <td><strong>Location:</strong><br /><?=$srDetails->location?></td>
                        <td><strong>Developer:</strong><br /><?=$srDetails->developer?></td>
                  </tr>
                  <tr>
                        <td><strong>Financing Scheme:</strong><br /><?=$srDetails->financing_scheme?></td>
                        <td><strong>Blk/Floor:</strong><br /><?=$srDetails->blk_floor?></td>
                  </tr>
                  <tr>
                        <td><strong>Lot/Unit:</strong><br /><?=$srDetails->lot_unit?></td>
                        <td><strong>Phase:</strong><br /><?=$srDetails->phase?></td>
                  </tr>
                  <tr>
                        <td><strong>Lot Area:</strong><br /><?=$srDetails->lot_area?></td>
                        <td><strong>Floor Area:</strong><br /><?=$srDetails->floor_area?></td>
                  </tr>
                  <tr>
                        <td><strong>TCP:</strong><br /><?=$srDetails->net_total_contract_price?></td>
                        <td><strong>Miscellaneous:</strong><br /><?=$srDetails->miscellaneous?></td>
                  </tr>
                  <tr>
                        <td><strong>Downpayment:</strong><br /><?=$srDetails->downpayment?></td>
                        <td><strong>Schedule of Payment:</strong><br /><?=$srDetails->schedule_downpayment?></td>
                  </tr>
                  <tr>
                        <td><strong>Monthly DP:</strong><br /><?=$srDetails->monthly_dp?></td>
                        <td><strong>Sales Person:</strong><br /><?=$srDetails->sales_person?></td>
                  </tr>
                  <tr>
                        <td><strong>TL/SD:</strong><br /><?=$srDetails->tl_sd?></td>
                        <td><strong>Broker:</strong><br /><?=$srDetails->createdBy?></td>
                  </tr>
            </table>


            <p>Click the link below to manage the sales report.<br />
            <a href="<?=base_url('pending_sales_report/' . $srDetails->id . '/pending')?>"><?=base_url('pending_sales_report/' . $srDetails->id . '/pending')?></a></p>

            <p>Thank you</p>

            <div style="font-size:12px; margin-top:30px; dispaly:block; font-style:italic;"><?=$this->lang->line('common_text_12')?></div>
      </div>
      <div style="border-top: 1px solid #EEE; padding: 25px;">
            <?php echo date('Y') . " &copy; RCD PEARL HOMES REALTY INC.";?>
      </div>
</div>
</body>
</html>