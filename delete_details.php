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
<link rel="stylesheet" type="text/css" href="embelish/delete_details.css"></link>
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
			
			<?php
					if(isset($_POST['btnDel'])) {
					if("Delete"==$_POST['btnDel']) {
						$num = $row1->empnum;
						
						
						$a1 = "DELETE FROM tblpay WHERE empnum='$num'";
						mysql_query($a1);
						
						$b1 = "DELETE FROM tbluser WHERE empnum='$num'";
						mysql_query($b1);
						
						$c1 = "DELETE FROM tblprof WHERE empnum='$num'";
						mysql_query($c1);
						echo ("<h3><center>"."Record ".$num. " officially Deleted</center></h3>");
					}
				}
							
				?>
			
			<div id="content">
				
				
				<table>
					<tr>
						<th colspan="2">Delete Information</th>
					</tr>
				
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
						<td>Employee #:&nbsp;</td>
						<td><input type="text" name="txtEmp" id="txtEmp" size="30" value="<?php echo $row1->empnum?> "autocomplete="off" readonly></td>
					</tr>
						
					<tr>
						<td colspan="2">
							<a href="delete.php" style="text-decoration:none">
							<input type="button" name="btnBck" id="btnBack" value="Back">
							</a>
							<input type="submit" name="btnDel" id="btnDel" value="Delete">
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