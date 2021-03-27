<?php
	session_start();
	if($_SESSION['role']=='4' || $_SESSION['role']=='3' || 
       $_SESSION['role']=='2' || $_SESSION['role']=='1') {
	include("config.php");
	
	if(isset($_POST['btnSnd'])) {
		if("Send"==$_POST['btnSnd']) {
			$emp = $_POST['txtEmp'];
					
			$q1 = "SELECT empnum,fname,mname,lname FROM tbluser WHERE empnum like concat('$emp','%')";
			$q2 = mysql_query($q1);
						
				}
			}
		else {
			$q1 = "SELECT empnum,fname,mname,lname FROM tbluser WHERE empnum=' '";
			$q2 = mysql_query($q1);
		}
			
?>
	
<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="embelish/delete_decor.css"></link>
</head>
<body>
	<form method="POST">
	<div id="wrap">
		<div id="head">Delete records</div>
		<div id="menu">
			<ul>
				<?php include("home_link.php");?>
			</ul>
		</div>
		
		<div id="content">
			<div id="t1">
			<table>
				<tr>
					<td><input type="text" name="txtEmp" id="txtEmp" size="40" placeholder="Enter employee number to delete">
					<input type="submit" name="btnSnd" id="btnSnd" value="Send">
					<input type="submit" name="btnRst" id="btnRst" value="Reset">
					</td>
				</tr>
			</table>
			</div>
			
			<div id="t2">
			<table>
				<tr id="P2">
					<td>Emp #</td>
					<td>LastName</td>
				</tr>
				
			<?php
				while($row=mysql_fetch_assoc($q2)) {
			?>
				<tr>
					<td>
						<a href="delete_details.php?id=<?php echo $row['empnum'];?>" style="text-decoration:none;font-size:16px;" >
						<?php echo $row['empnum'];?>
						</a>
					</td>
					<td><?php echo $row['lname'];?></td>
				</tr>
				
			<?php
				}
			?>
			</table>	
			</div>
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
