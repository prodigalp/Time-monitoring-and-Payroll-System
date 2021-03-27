<?php
	session_start();
	if($_SESSION['role']=='4' || $_SESSION['role']=='3' || 
       $_SESSION['role']=='2' || $_SESSION['role']=='1') {
	
	include("config.php");
	include("attach.php");
?>

<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="embelish/add_decor.css"></link>
</head>
<body onload="mF()">
	<form method="POST">
	<div id="wrap">
		<div id="head">New Entry</div>
		<div id="menu">
			<ul>
				<?php include("home_link.php");?>
			</ul>
		</div>
		
		<div id="content">
			
			<table>
				<tr>
					<th colspan="2">INSTRUCTOR's INFORMATION</th>
				</tr>
				<tr>
					<td>School:&nbsp;</td>
					<td><input type="text" name="txtSch" id="txtSch" size="35" value="SJCB" readonly></td>
				</tr>
				<!-------[   tbluser  ]----------------------->
				<tr>
					<td>FirstName:&nbsp;</td>
					<td><input type="text" name="txtFnm" id="txtFnm" size="30" autocomplete="off" ></td>
				</tr>
				
				<tr>
					<td>MiddleName:&nbsp;</td>
					<td><input type="text" name="txtMnm" id="txtMnm" size="30" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>LastName:&nbsp;</td>
					<td><input type="text" name="txtLnm" id="txtLnm" size="30" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>Username:&nbsp;</td>
					<td><input type="text" name="txtUsr" id="txtUsr" size="30" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>Password:&nbsp;</td>
					<td><input type="password" name="txtPas" id="txtPas" size="30" ></td>
				</tr>
				
				<tr>
					<td>Group:&nbsp;</td>
					<td>
						<select name="txtGrp" id="txtGrp" size="1">
						<option>---</option>
						<option>S.A.</option>
						<option>Partime</option>
						<option>Fulltime</option>
						<option>Administrator</option>
						</select>
					
					</td>
				</tr>
				
				<tr>
					<td>Role:&nbsp;</td>
					<td>
						<select name="opnRol" size="1">
						<option>---</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						</select>
					</td>
				</tr>
				
				
				<!-------[   tblpay   ]----------------------->
				
				
				<tr>
					<td>Employee #:&nbsp;</td>
					<td><input type="text" name="txtEmp" id="txtEmp" size="30" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>Department:&nbsp;</td>
					<td><input type="text" name="txtDep" id="txtDep" size="30" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>Marital Status:&nbsp;</td>
					<td><input type="text" name="txtMs" id="txtMs" size="30" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>SSS #:&nbsp;</td>
					<td><input type="text" name="txtSS" id="txtSS" size="30" maxlength="12" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>TIN #:&nbsp;</td>
					<td><input type="text" name="txtTin" id="txtTin" size="30" maxlength="11"autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>SSS Deduc:&nbsp;</td>
					<td><input type="text" name="txtSde" id="txtSde" size="30" placeholder="Amount" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>TAX Deduc:&nbsp;</td>
					<td><input type="text" name="txtTde" id="txtTde" size="30"  placeholder="Amount" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>PH Deduc:&nbsp;</td>
					<td><input type="text" name="txtPhd" id="txtPhd" size="30"  placeholder="Philhealth" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>Basic Rate:&nbsp;</td>
					<td><input type="text" name="txtRyt" id="txtRyt" size="10" placeholder="Amount" autocomplete="off"></td>
				</tr>
				
				<tr>
					<td>Remarks:&nbsp;</td>
					<td>
						<select name="txtRem" size="1">
							<option>---</option>
							<option>Active</option>
							<option>Inactive</option>
						</select>
					</td>
				</tr>
				
				
				<tr>
					<td>Scheduled In:&nbsp;</td>
					<td>
						<input type="text" name="txtIn" id="txtIn" size="10" placeholder="Military time" autocomplete="off">
					</td>
				</tr>
				
				<tr>
					<td>Scheduled Out:&nbsp;</td>
					<td>
						<input type="text" name="txtOut" id="txtOut" size="10" placeholder="Military time" autocomplete="off">	
					</td>
				</tr>
				
				<!-------[   tblprof   ]----------------------->
				<tr>
					<td>Email:&nbsp;</td>
					<td>
						<input type="text" name="txtEml" id="txtEml" size="30" autocomplete="off">	
					</td>
				</tr>
				
				<tr>
					<td>Contact #:&nbsp;</td>
					<td>
						<input type="text" name="txtCon" id="txtCon" size="30" autocomplete="off">	
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" name="btnSnd" id="btnSnd" value="Add Instructor">
						<input type="submit" name="btnRst" id="btnRst" value="Reset">
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