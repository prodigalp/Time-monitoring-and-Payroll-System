<?php
session_start();
include("config.php");

if(isset($_POST['btnSnd'])) {
	if("Send"==$_POST['btnSnd']) {
		$usr = $_POST['txtUsr'];
		$pwd = md5($_POST['txtPwd']);
		
			$ps1 = "SELECT * FROM tbluser WHERE username='$usr' && password='$pwd'";
			$ps2 = mysql_query($ps1);
			// Use to find a match in the db
			$ps3 = mysql_num_rows($ps2);
			// Use to display data and transfer it to the session
			$ps4 = mysql_query($ps1);
			if($ps3>=1) {
				$row = mysql_fetch_assoc($ps4);
				$_SESSION['ctrl'] = $row['id'];
				$_SESSION['name'] = $row['fname'];
				$_SESSION['gtyp'] = $row['gtype'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['usr'] = $row['username'];
				$_SESSION['pwd'] = $row['password'];
				header("location: home.php");
				}
			
			else {
				die(" 
				<style type='text/css'>
					#warn {
						color:#FFFF00;
						margin:60px auto;
						width:300px;
						background:#FF0000;
						text-align:center;
						text-decoration:blink;
						font-size:30px;
						padding:20px;
						border-radius:15px;
						font-family:monospace;
						font-weight:bold;
						box-shadow: 0 0 0.6em rgba(1,1,1,0.4);
					}
				</style>
				
				<div id='warn'>
				 Invalid entry!
				</div>
				
				<center><a href='index.php' style='text-decoration:none'>
				<input type='submit' value='Back'>
				</a></center>
				
				");
			}
		}
	}
mysql_close($con);
?>

<html>
<head>
<title>Library Log-in</title>
<link rel="stylesheet" type="text/css" href="embelish/login_decor.css"></link>
<script type="text/javascript">
	function c_On(x) {
		document.getElementById('txt'+x).style.backgroundColor = "#FFFF00";
	}
	
	function c_Of(x) {
		document.getElementById('txt'+x).style.backgroundColor = "#FFF";
	}
</script>
</head>
<body>
<style type="text/css">
body { 
	background-image: url("embelish/Assorted.jpg");
	background-repeat:no-repeat;
}

</style>
<div id="wraper">
		<div id="content">	
		<div id="header">Account Verification</div>
		<form name="logIn" id="logIn" method="POST">
			<table>
				<tr>
					<td>Username:&nbsp;</td>
					<td><input type="text" name="txtUsr" id="txtUsr" size="30" autocomplete="off" 
					title="Enter username!" onFocus="c_On('Usr')" onBlur="c_Of('Usr')" /></td>
				</tr>
				
				<tr>
					<td>Password:&nbsp;</td>
					<td><input type="password" name="txtPwd" id="txtPwd" size="30" autocomplete="off"
					title="Enter your password!" onFocus="c_On('Pwd')" onBlur="c_Of('Pwd')" /></td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" name="btnSnd" id="btnSnd" value="Send">
						<input type="submit" name="btnRst" id="btnRst" value="Reset">
						<a href="pwd_change.php" 
						style="font-size:16px;
						text-decoration:none;
						font-weight:normal;
						color:blue;
						">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>