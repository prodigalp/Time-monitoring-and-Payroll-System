<?php
	session_start();
	if($_SESSION['role']=='4' || $_SESSION['role']=='3' || 
       $_SESSION['role']=='2' || $_SESSION['role']=='1') {
	
	include("config.php");
	
	
	// Button IN
	// Searching for a match of employee # in both tblprof and tblts
	if(isset($_POST['btnIn']))  {
		// Searching for a match in tblprof
		$emp = $_POST['txtEmp'];
		$t1 = "SELECT empnum FROM tbluser WHERE empnum='$emp'";
		$t2 = mysql_query($t1);
		$t3 = mysql_num_rows($t2);
		
		// Searching for a match in tblts
		$q1 = "SELECT empnum FROM tblts WHERE empnum='$emp'";
		$q2 = mysql_query($q1);
		$q3 = mysql_num_rows($q2);
		
		// if no match in tblts and tbluser, display this
		if($t3==0 && $q3==0 ) {
			echo("<br><br><br><br><center>
				<h2 style='background:#FF0000;color:#FFFF00;text-decoration:blink'>Invalid Employee number</h2>
				<br><br>");
			echo("
				<a href='simdex.php' style='text-decoration:none'>
				<input type='submit' value='Back'>
				</a></center>
				");
			die();
		}
		//if there is 1 match in tblprof and no match in tblts, perform this
		else if($t3==1 && $q3==0) {
			// Search data matching the employee number entered by the user
			$try1 = "SELECT * FROM tbluser WHERE empnum='$emp'";
			$try2 = mysql_query($try1);
			$row = mysql_fetch_assoc($try2);
			
			// get the data from tbluser and insert to tblts
			$f = $row['fname'];
			$m = $row['mname'];
			$l = $row['lname'];
		
			$r1 = "INSERT INTO tblts(empnum,date,timein,fname,mname,lname) VALUES('$emp',current_date(),current_time(),'$f','$m','$l')";
			mysql_query($r1);
			echo("
				<style type='text/css'>
					#warn {
						color:#000;
						margin:60px auto;
						width:400px;
						background:#00FF00;
						text-align:center;
						text-decoration:blink;
						font-size:26px;
						padding:18px;
						border-radius:15px;
						font-family:monospace;
						font-weight:bold;
						box-shadow: 0 0 0.4em rgba(1,1,1,0.4);
					}
					body {
						background:#eee;
					}
					
					input[type='submit'] {
					font-family:arial;
					font-size:20px;
					border-radius:5px;
					box-shadow:0 0 0.3em rgba(1,1,1,0.3);
					}	
				</style>
				
				<div id='warn'>
				 $f successfully log-in!
				</div>
				
				<center><a href='simdex.php' style='text-decoration:none'>
				<input type='submit' value='Back'>
				</a></center>
				");
			die();
			
		}
		//If double entry of log-in, without logging out first, display this.
		else if($q3>=1) {
			echo("<br><br><br><br><center>
				<h2 style='background:#306EFF;color:#FFFF00;text-decoration:blink'>You're not allowed to log-in again, unless you log-out first!!!</h2>
				<br><br>");
			echo("
				<a href='simdex.php' style='text-decoration:none'>
				<input type='submit' value='Back'>
				</a></center>
				");
			die();
		}
	}
	else {
		$log1 = "SELECT * FROM tblts WHERE empnum=' '";
		$log2 = mysql_query($log1);
	}
	
	// Button OUT
	// Searching for a match of employee # in both tblprof and tblts
	if(isset($_POST['btnOut']))  {
		// Searching for a match in tblprof.
		$emp = $_POST['txtEmp'];
		$t1 = "SELECT empnum FROM tblprof WHERE empnum='$emp'";
		$t2 = mysql_query($t1);
		$t3 = mysql_num_rows($t2);
		
		// Searching for a match in tblts.
		$q1 = "SELECT empnum FROM tblts WHERE empnum='$emp'";
		$q2 = mysql_query($q1);
		$q3 = mysql_num_rows($q2);
		
		// If no match in tblts and tblprof, display this.
		if($t3==0 && $q3==0 ) {
			echo("<br><br><br><br><center>
				<h2 style='background:#FF0000;color:#FFFF00;text-decoration:blink'>Invalid Employee number</h2>
				<br><br>");
			echo("
				<a href='simdex.php' style='text-decoration:none'>
				<input type='submit' value='Back'>
				</a></center>
				");
			die();
		}
		
		//If user immediately log-out, and didn't log-in first, display this.
		else if($t3==1 && $q3==0) {
			echo("<br><br><br><br><center>
				<h2 style='background:#306EFF;color:#FFF;text-decoration:blink'>You should log-in first!!!</h2>
				<br><br>");
			echo("
				<a href='simdex.php' style='text-decoration:none'>
				<input type='submit' value='Back'>
				</a></center>
				");
			die();
		}
		
		// Insert all the data (including both time-in & time-out) and transfer it from tblts to 
		// tblrecord and delete also all the information specific to that employee number.
		else if($q3>=1) {
			
			// time-out inserted
			$r1 = "UPDATE tblts SET empnum='$emp', date=current_date(), timeout=current_time() WHERE empnum='$emp'";
			mysql_query($r1);
			
			// Copying of data from tblts to tblrecord
			$s1 = "INSERT INTO tblrecord SELECT * FROM tblts WHERE empnum='$emp'";
			mysql_query($s1);
			
			$s2 = "UPDATE tblrecord SET timeset=subtime(timeout,timein)";
			mysql_query($s2);
			
			// delete the data of that specific employee number to tblts
			$a1 = "DELETE FROM tblts WHERE empnum='$emp'";
			mysql_query($a1);
			
			// Search data matching the employee number entered by the user
			$try1 = "SELECT * FROM tbluser WHERE empnum='$emp'";
			$try2 = mysql_query($try1);
			$row = mysql_fetch_assoc($try2);
			
			// get the data from tbluser and insert to tblts
			$f = $row['fname'];
			
			echo("
				<style type='text/css'>
					#warn {
						color:#000;
						margin:60px auto;
						width:400px;
						background:#00FF00;
						text-align:center;
						text-decoration:blink;
						font-size:26px;
						padding:18px;
						border-radius:15px;
						font-family:monospace;
						font-weight:bold;
						box-shadow: 0 0 0.4em rgba(1,1,1,0.4);
					}
					body {
						background:#eee;
					}
					
					input[type='submit'] {
					font-family:arial;
					font-size:20px;
					border-radius:5px;
					box-shadow:0 0 0.3em rgba(1,1,1,0.3);
					}	
				</style>
				
				<div id='warn'>
				 $f successfully log-out!
				</div>
				
				<center><a href='simdex.php' style='text-decoration:none'>
				<input type='submit' value='Back'>
				</a></center>
				");
			die();
		}
	}

?>

<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="embelish/decor.css"></link>
<script type="text/javascript" src="impress/index_clock.js"></script>
</head>

<body onload="mF()">
	<form method="POST">
	<div id="wrap">
		<div id="head">Time-in</div>
		<div id="menu">
			<ul>
				<?php include("home_link.php");?>
			</ul>
		</div>
		
		
		<div id="content">
			<div id="placetime"></div>
			
				<div id="bot">
				<input type="text" name="txtEmp" id="txtEmp" size="30" autocomplete="off" placeholder="Employee number"><br><br><br>
				<div id="tag">OPERATION:</div><br>
				<input type="submit" name="btnIn" id="btnIn" value="IN">
				<input type="submit" name="btnOut" id="btnOut" value="OUT"><br><br><br>
				<div id="CD"><?php print(date("l F d, Y")); ?></div>
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