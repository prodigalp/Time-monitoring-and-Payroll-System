<?php
session_start();
if($_SESSION['role']=='4' || $_SESSION['role']=='3' || 
   $_SESSION['role']=='2' || $_SESSION['role']=='1') {
 ?>

<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="embelish/home_decor.css"></link>
</head>
<body>
	<form name="main" id="main" method="POST" action="logout.php">
	<div id="wraper">
		<div id="head">Homepage</div>
		<div id="menu">
			<ul>
				<?php include("home_link.php");?>
			</ul>
		</div>
		
		<div id="content">
		<table>
				<tr>
					<td>Active User:&nbsp;</td>
					<td><input type="text" name="txtNme" id="txtNme" size="25" value="<?php echo $_SESSION['name']; ?>" readonly></td>
				</tr>
				<tr>
					<td><input type="hidden" name="txtUsr" id="txtUsr" size="25" value="<?php echo $_SESSION['usr']; ?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="txtPwd" id="txtPwd" size="25" value="<?php echo $_SESSION['pwd']; ?>"></td>
				</tr>
			</table>
		<img src="embelish/front.jpg"><br/>
		<input type="submit" name="btnOut" id="btnOut" value="Logout">
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