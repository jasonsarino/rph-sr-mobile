<html>
<head>
	<title><?php echo $page_title;?></title>
<style type="text/css">
<?php if($print){?>
.headerTitle {font-family: Arial, Helvetica, sans-serif;padding-top: 5px;padding-bottom: 20px;}
.headerLogo{}
.headerReportTitle{font-family: Arial, Helvetica, sans-serif;margin-bottom: 20px;float: left;}
#tblList table {border-collapse: separate;border-spacing: 0;}
table#tblList th,table#tblList td {padding: 5px 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;}
#tblList thead {background: #395870;color: #fff;}
#tblList tbody tr:nth-child(even) {background: #f0f0f2;}
#tblList td {border-bottom: 1px solid #cecfd5;border-right: 1px solid #cecfd5;}
#tblList td:first-child {border-left: 1px solid #cecfd5;}
table.tblHeader {top-margin:15px; border:1px solid #CCC; border-collapse: collapse; margin-bottom: 25px;}
table.tblHeader th,table.tblHeader td {padding: 5px 5px !important;font-family: Arial, Helvetica, sans-serif;font-size: 12px;}
.daterpt{float: right;font-family: Arial, Helvetica, sans-serif;}
.preparedBy{float: right; margin-top: 25px;}
</style>
<?php }else {?>
<style type="text/css">
.headerTitle {font-family: Arial, Helvetica, sans-serif;padding-top: 5px;font-size: 8px;}
.headerLogo{}
.headerReportTitle{font-family: Arial, Helvetica, sans-serif;margin-bottom: 20px;float: left;font-size: 10px;}
#tblList table {border-collapse: separate;border-spacing: 0;}
table#tblList th,table#tblList td {padding: 4px 4px;font-family: Arial, Helvetica, sans-serif;font-size: 10px;}
#tblList thead {background: #395870;color: #fff;}
#tblList tbody tr:nth-child(even) {background: #f0f0f2;}
#tblList td {border-bottom: 1px solid #cecfd5;border-right: 1px solid #cecfd5;}
#tblList td:first-child {border-left: 1px solid #cecfd5;}
table.tblHeader {top-margin:15px; border:1px solid #CCC; border-collapse: collapse; margin-bottom: 25px;}
table.tblHeader th,table.tblHeader td {padding: 5px 5px !important;font-family: Arial, Helvetica, sans-serif;font-size: 10px;}
.daterpt{float: right;font-family: Arial, Helvetica, sans-serif;}
.preparedBy{float: right; margin-top: 25px;font-size: 10px;}
.tblpdf{font-size: 10px; margin-top: 20px;}
</style>
<?php }?>
<?php if($print){?>
<style type="text/css">
@media print
{    
    #printLink
    {
        display: none !important;
    }
}	
</style>
<?php }?>
</head>
<body>
<center>
	<div class="headerLogo"><img src="<?=base_url('assets/images/logo/rcd-logo.png')?>" alt="<?=$short_system_title?>" style="width:100px !important;"/></div>
	<div class="headerTitle"><?=$short_system_title?><br />SALES REPORT</div>
</center>

<?php if($SrReports){?>

<?php 
if( $_POST['filterBy'] == "createdDate" ) {
	$dateBy = "Created Date";
} else {
	$dateBy = "Reservation Date";
}

$dateFrom =  explode(" - ", $this->input->post('dateRange'))[0];
$dateTo =  explode(" - ", $this->input->post('dateRange'))[1];
$dateFrom = date("F d, Y", strtotime($dateFrom));
$dateTo = date("F d, Y", strtotime($dateTo));
?>
<div>
	<p>
		<strong><?=$dateBy?> Range:</strong> <?=$dateFrom." to ".$dateTo?><br />

		<?php if( isset($_POST['name_of_project']) AND $_POST['name_of_project'] != "" ) {?>
		<strong>Name of Project:</strong> <?=$_POST['name_of_project']?><br />
		<?php } ?>

		<?php if( isset($_POST['financing_scheme']) AND $_POST['financing_scheme'] != "" ) {?>
		<strong>Financing Scheme:</strong> <?=$_POST['financing_scheme']?><br />
		<?php } ?>

		<?php if( $_POST['nStatus'] != "all" ) {?>
		<strong>Status: </strong> <?=($_POST['nStatus'] == 1) ? "Approved" : "Pending"?>
		<?php } else { echo "<strong>Status: </strong> All Status";} ?>
	</p>
</div>
<table cellpadding="2" cellspacing="2" style="top-margin:15px" id="tblList">
	<thead>
		<tr style="border-bottom: 1px solid #000 !important;">
			<td>BUYER NAME</td>
			<td>ADDRESS</td>
			<td>TEL/CEL</td>
			<td>OCCUPATION</td>
			<td>RESERVATION DATE</td>
			<td>NAME OF PROJECT</td>
			<td>LOCATION</td>
			<td>DEVELOPER</td>
			<td>FINANCING SCHEME</td>
			<td>BLK/FLOOR</td>
			<td>LOT/UNIT</td>
			<td>PHASE</td>
			<td>LOT AREA</td>
			<td>FLOOR AREA</td>
			<td>TCP</td>
			<td>DAS AMOUNT</td>
			<td>MISCELLANEOUS</td>
			<td>DOWNPAYMENT</td>
			<td>SCHEDULE OF PAYMENT</td>
			<td>MONTHLY DP</td>
			<td>SALES PERSON</td>
			<td>TL/SD</td>
			<td>BROKER</td>
			<td>CREATED DATE</td>
			<td>STATUS</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($SrReports as $rs){ ?>
		<tr>
			<td nowrap><?=$rs->buyer_name?></td>
			<td nowrap><?=$rs->address?></td>
			<td nowrap><?=$rs->tel_cell?></td>
			<td nowrap><?=$rs->occupation?></td>
			<td><?=date("Y/m/d", strtotime($rs->reservation_date))?></td>
			<td nowrap><?=$rs->name_of_project?></td>
			<td nowrap><?=$rs->location?></td>
			<td nowrap><?=$rs->developer?></td>
			<td nowrap><?=$rs->financing_scheme?></td>
			<td style="text-align:center;"><?=$rs->blk_floor?></td>
			<td style="text-align:center;"><?=$rs->lot_unit?></td>
			<td style="text-align:center;"><?=$rs->phase?></td>
			<td style="text-align:right;" nowrap><?=$rs->lot_area?></td>
			<td style="text-align:right;" nowrap><?=$rs->floor_area?></td>
			<td style="text-align:right;"><?=number_format($rs->net_total_contract_price, 2)?></td>
			<td style="text-align:right;"><?=number_format($rs->das_amount, 2)?></td>
			<td style="text-align:right;"><?=number_format($rs->miscellaneous, 2)?></td>
			<td style="text-align:right;"><?=number_format($rs->downpayment, 2)?></td>
			<td style="text-align:right;"><?=number_format($rs->schedule_downpayment, 2)?></td>
			<td style="text-align:right;"><?=number_format($rs->monthly_dp, 2)?></td>
			<td nowrap><?=$rs->sales_person?></td>
			<td nowrap><?=$rs->tl_sd?></td>
			<td nowrap><?=$rs->createdBy?></td>
			<td nowrap><?=date("Y/m/d", strtotime($rs->createdDate))?></td>
			<td nowrap><?=( $rs->sr_status == 1 ) ? "Approved" : "Pending" ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php 
} else {
echo "No data found.";
} ?>
<?php if($print){?>
<br /><br />
<?php }?>
</body>
</html>