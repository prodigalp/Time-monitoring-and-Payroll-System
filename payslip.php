<?php
	session_start();
	if($_SESSION['role']=='4' || $_SESSION['role']=='3' || 
       $_SESSION['role']=='2' || $_SESSION['role']=='1') {
	
	include("config.php");
	
	// Assign value of id to a variable 
	$id1 = $_GET['id'];
	$id2 = $_GET['id2'];
	
	$q1 = "SELECT * FROM tbluser WHERE empnum='$id1'";  // all the data from tbluser
	$q2 = mysql_query($q1);
	
	$r1 = "SELECT * FROM tblpay WHERE empnum='$id1'";  // all the data from tblpay
	$r2 = mysql_query($r1);
	
	$s1 = "SELECT * FROM tblprof WHERE empnum='$id1'";  // all the data from tblprof
	$s2 = mysql_query($s1);
	
	$t1 = "SELECT substr('$id2',1,2) as strng";  // for hours
	$t2 = mysql_query($t1);

	$u1 = "SELECT substr('$id2',4,2) as strng1"; // for minutes
	$u2 = mysql_query($u1);	
	
	$v1 = "SELECT concat(substr('$id2',1,2),'.',substr('$id2',4,2)) as duo"; // combine hours and minutes
	$v2 = mysql_query($v1);	
	
	if(isset($_POST['btnSnd'])) {
	if("Send"==$_POST['btnSnd']) {
			}
		}
?>
		
<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="embelish/payslip_decor.css"></link>
<script type='text/javascript'>
<!--
// Print Function
function pagers(elementId) {
	var printContent = document.getElementById(elementId);
	var windowUrl = 'about:blank';
	var uniqueName = new Date();
	var windowName = 'Print' + uniqueName.getTime();
	
	var printWindow = window.open(windowUrl, windowName, 'left=50000,top=50000,width=40000,height=40000');
	
	printWindow.document.write(printContent.innerHTML);
	printWindow.document.close();
	printWindow.focus();
	printWindow.print();
	printWindow.close();
	}
	// -->
</script>

</head>
<body>
	<form method="POST">
	<div id="wrap">
		<div id="head">Payslip</div>
		<div id="menu">
			<ul>
				<?php include("home_link.php");?>
			</ul>
		</div>
		
		<?php $row = mysql_fetch_assoc($t2) ?>
		<?php $rol = mysql_fetch_assoc($u2) ?>
		<?php $ros = mysql_fetch_assoc($v2) ?>	<!--Convert time to integer -->
		
		<!--<?php echo $id1.' '. $id2; ?> -->
		<!--<?php echo $row['strng']?> -->
		<!--<?php echo $rol['strng1']?> -->
		<!--<?php echo $ros['duo']?> -->
		
		<?php $row1 = mysql_fetch_assoc($q2) ?>
		<?php $row2 = mysql_fetch_assoc($r2) ?>
		<?php $row3 = mysql_fetch_assoc($s2) ?> 
		
		<div id="content">
			<div id='print1'>
				<table width="100%" style="text-align:justify;background:#00FF00;border:2px solid #000;">
					<tr>
					<td>Saint Joseph College of Bulacan</td>
					<td style="text-align:right">SSS #: <?php echo $row2['sss']?></td>
					</tr>
					<tr>
					<td>EMP #: <?php echo $row2['empnum']?></td>
					<td style="text-align:right">TIN #: <?php echo $row2['tin']?></td>
					</tr>
					<tr>
					<td style="text-transform:uppercase;font-weight:bold;font-size:16px"><?php echo $row1['fname'].' '. $row1['mname'].' '.$row1['lname'] ?></td>
					<td style="text-align:right">Status: <?php echo $row2['ms']?></td>
					</tr>
					
				</table>
				
				<table width="100%" border="1" style="text-align:center">
					<tr>
						<td colspan="3"><b>EARNINGS</b></td>
						<td colspan="2"><b>DEDUCTIONS</b></td>
					</tr>
					
					<tr>
						<td>Payment type</td>
						<td>Number</td>
						<td>Amount</td>
						<td>Payment type</td>
						<td>Amount</td>
					</tr>
					
					<tr>
						<td>Regular Hours</td>
						<td><?php echo $ros['duo'] ?></td>
						<td><?php echo $ros['duo'] * $row2['rpd']?></td>
						<td>SSS Deduction</td>
						<td><?php echo $row2['sssd']?></td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Tax Deduction</td>
						<td><?php echo $row2['taxd']?></td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Philhealth</td>
						<td><?php echo $row2['phid']?></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">Total Earnings:</td>
						<td><?php echo $ros['duo'] * $row2['rpd']?></td>
						<td>Total Deduction:</td>
						<td><?php echo $row2['sssd'] + $row2['taxd'] + $row2['phid']?> </td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
						<td style="background:#00FF00;font-weight:bold;font-size:16px;">NET PAY:&nbsp;&nbsp;</td>
						<td style="background:#00FF00;font-weight:bold;font-size:18px;font-family:arial;">
						<?php echo 
						($ros['duo'] * $row2['rpd']) - ($row2['sssd'] + $row2['taxd'] + $row2['phid'])
						?>
						</td>
					</tr>
					<tr><td colspan="5">&nbsp;</tr>
					
					<tr>
						<td colspan="5" style="text-align:left;background:#FFFF00"><b>&nbsp;&nbsp;Rate / hr:&nbsp;<?php echo $row2['rpd']?></b></td>
					</tr>
				</table>
			</div>
		</div><br>
		<button onclick="JavaScript:pagers('print1');">
		<b style="font-size:16px;">PRINT</b></button>
	
	<div id="footer">Designed and Developed by: Group 1</div>
	</div>
	</form>
</body>
</html>
<?php
	}
	else {
	header("location: index.php");
}
?>