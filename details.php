<?php
	session_start();
	if($_SESSION['role']=='4' || $_SESSION['role']=='3' || 
     $_SESSION['role']=='2' || $_SESSION['role']=='1') {
	include("config.php");
	
	
	$id = $_GET['id'];
		
	$q1 = "SELECT * FROM tblpay WHERE empnum='$id'";
	$q2 = mysql_query($q1);
	
	$r1 = "SELECT * FROM tbluser WHERE empnum='$id'";
	$r2 = mysql_query($r1);
	
	$t1 = "SELECT * FROM tblprof WHERE empnum='$id'";
	$t2 = mysql_query($t1);
	
	$row1 = mysql_fetch_object($q2);
	$row2 = mysql_fetch_object($r2);
	$row3 = mysql_fetch_object($t2);
	
?>
<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="embelish/details_decor.css"></link>
</head>
<body onload="mF()">
	<form method="POST">
	<div id="wrap">
		<div id="head">Profile Section</div>
		<div id="menu">
			<ul>
				<?php include("home_link.php");?>
			</ul>
		</div>
		
		<div id="content">
			
			<table>
				<tr>
					<th colspan="2">Individual Record</th>
				</tr>
				<tr>
					<td>School:&nbsp;</td>
					<td><input type="text" name="txtSch" id="txtSch" size="35" value="SJCB" readonly></td>
				</tr>
				<!-------[   tbluser  ]----------------------->
				<tr>
					<td>FirstName:&nbsp;</td>
					<td><input type="text" name="txtFnm" id="txtFnm" size="30" value="<?php echo $row2->fname?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>MiddleName:&nbsp;</td>
					<td><input type="text" name="txtMnm" id="txtMnm" size="30" value="<?php echo $row2->mname?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>LastName:&nbsp;</td>
					<td><input type="text" name="txtLnm" id="txtLnm" size="30" value="<?php echo $row2->lname?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>Group:&nbsp;</td>
					<td><input type="text" name="txtGrp" id="txtGrp" size="30" value="Professor" readonly></td>
				</tr>
				
				<!-------[   tblpay   ]----------------------->
				<tr>
					<td>Employee #:&nbsp;</td>
					<td><input type="text" name="txtEmp" id="txtEmp" size="30" value="<?php echo $row1->empnum?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>Department:&nbsp;</td>
					<td><input type="text" name="txtDep" id="txtDep" size="30" value="<?php echo $row1->dept?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>Marital Status:&nbsp;</td>
					<td><input type="text" name="txtMs" id="txtMs" size="30" value="<?php echo $row1->ms?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>SSS #:&nbsp;</td>
					<td><input type="text" name="txtSS" id="txtSS" size="30" value="<?php echo $row1->sss?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>TIN #:&nbsp;</td>
					<td><input type="text" name="txtTin" id="txtTin" size="30" value="<?php echo $row1->tin?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>SSS Deduc:&nbsp;</td>
					<td><input type="text" name="txtSde" id="txtSde" size="30" placeholder="Amount" value="<?php echo $row1->sssd?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>TAX Deduc:&nbsp;</td>
					<td><input type="text" name="txtTde" id="txtTde" size="30"  value="<?php echo $row1->taxd?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>PH Deduc:&nbsp;</td>
					<td><input type="text" name="txtPhd" id="txtPhd" size="30"  value="<?php echo $row1->phid?> "autocomplete="off" readonly></td>
				</tr>
				
				<tr>
					<td>Basic Rate:&nbsp;</td>
					<td><input type="text" name="txtRyt" id="txtRyt" size="10" value="<?php echo $row1->rpd?> "autocomplete="off" readonly></td>
				</tr>
				<tr>
					<td>Scheduled In:&nbsp;</td>
					<td>
						<input type="text" name="txtIn" id="txtIn" size="10" value="<?php echo $row1->sked_in?> "autocomplete="off" readonly>
					</td>
				</tr>
				
				<tr>
					<td>Scheduled Out:&nbsp;</td>
					<td>
						<input type="text" name="txtOut" id="txtOut" size="10" value="<?php echo $row1->sked_out?> "autocomplete="off" readonly>	
					</td>
				</tr>
				
				<!-------[   tblprof   ]----------------------->
				<tr>
					<td>Email:&nbsp;</td>
					<td>
						<input type="text" name="txtEml" id="txtEml" size="30" value="<?php echo $row3->email?> "autocomplete="off" readonly>	
					</td>
				</tr>
				
				<tr>
					<td>Contact #:&nbsp;</td>
					<td>
						<input type="text" name="txtCon" id="txtCon" size="30" value="<?php echo $row3->contactnum?> "autocomplete="off" readonly>	
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<a href="view.php" style="text-decoration:none">
						<input type="button" name="btnBck" id="btnBack" value="Back">
						</a>
						<input type="button" name="btnRst" id="btnRst" value="Print" onClick="window.print();">
					</td>
				</tr>
				
			</table>
		</div>
	
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