<?php
	session_start();
	if($_SESSION['role']=='4' || $_SESSION['role']=='3' || 
       $_SESSION['role']=='2' || $_SESSION['role']=='1') {
	
	include("config.php");
	
	
	// Initial value of date 1
	$month1 ='---';
	$month2 ='---';
	$zd1    ='x';
	$zd2    ='x';
	$y1     ='----';
	$y2     ='----';
	
	
	if(isset($_POST['btnSnd'])) {
		if("Send"==$_POST['btnSnd']) {
			$emp = $_POST['txtEmp'];
			$log = $_POST['txtLog'];
			
			if($log=="In") {
				$q1 = "SELECT * FROM tblts WHERE empnum='$emp'";
				$q2 = mysql_query($q1);
				
				$s1 = "SELECT sec_to_time(sum(time_to_sec(timeset))) as total FROM tblts WHERE empnum='$emp'";
				$s2 = mysql_query($s1);
				
				$us1 =  "SELECT * FROM tbluser WHERE empnum='$emp'";
				$us2 = mysql_query($us1);
			
				$z1 =  "SELECT * FROM tblpay WHERE empnum='$emp'";
				$z2 = mysql_query($z1);
				}
			
			else if($log=="Out") {
				//$q1 = "SELECT * FROM tblrecord WHERE empnum='$emp'";
				//$q2 = mysql_query($q1);
				
				// Date use in First year entry
				$m1=$_POST['txtM1'];
				$m_a1=array("---"=>"---","January"=>"1","February"=>"2","March"=>"3","April"=>"4","May"=>"5","June"=>"6",
							"July"=>"7","August"=>"8","September"=>"9","October"=>"10","November"=>"11","December"=>"12");
				// Month 1
				$month1=$m_a1[$m1];     // MONTH 1
				$zd1 = $_POST['txtD1']; // DAY 1
				$y1 = $_POST['txtY1'];  // YEAR 1
				
				// Date use in Second year entry
				$m2=$_POST['txtM2'];
				$m_a2=array("---"=>"---","January"=>"1","February"=>"2","March"=>"3","April"=>"4","May"=>"5","June"=>"6",
							"July"=>"7","August"=>"8","September"=>"9","October"=>"10","November"=>"11","December"=>"12");
				// Month 2
				$month2=$m_a2[$m2];     // MONTH 2
				$zd2 = $_POST['txtD2'];	// DAY 2
				$y2 = $_POST['txtY2'];  // YEAR 2
				
				$q1 = "SELECT * FROM tblrecord WHERE date>=concat('$y1','-','$month1','-','$zd1') && date<=concat('$y2','-','$month2','-','$zd2') && empnum='$emp' ";
				$q2 = mysql_query($q1);
				
				// For total time
				$s1 = "SELECT sec_to_time(sum(time_to_sec(timeset))) as total FROM tblrecord WHERE empnum='$emp'";
				$s2 = mysql_query($s1);
				
				// Use for employee data display -->
				$us1 =  "SELECT * FROM tbluser WHERE empnum='$emp'";
				$us2 = mysql_query($us1);
			
				// Use for employee data display -->
				$z1 =  "SELECT * FROM tblpay WHERE empnum='$emp'";
				$z2 = mysql_query($z1);
				}
			else if($log=="All" && $emp=='' || $emp<>'') {
				// Display the overall data
				$q1 = "SELECT * FROM tblrecord WHERE empnum like concat('$emp','%') ORDER BY date DESC LIMIT 100";
				$q2 = mysql_query($q1);
				
				// For total time
				$s1 = "SELECT sec_to_time(sum(time_to_sec(timeset))) as total FROM tblrecord WHERE empnum like concat('$emp','%')";
				$s2 = mysql_query($s1);
				
				// Use for employee information display
				$us1 =  "SELECT * FROM tbluser WHERE empnum='$emp'";
				$us2 = mysql_query($us1);
			
				// Use for employee information display
				$z1 =  "SELECT * FROM tblpay WHERE empnum='$emp'";
				$z2 = mysql_query($z1);
				}
			}
		}
			
		else {
			$q1 = "SELECT * FROM tblrecord WHERE empnum=' ' ";
			$q2 = mysql_query($q1);
			
			$s1 = "SELECT * FROM tblrecord WHERE empnum=' ' ";
			$s2 = mysql_query($s1);
			
			$us1 =  "SELECT * FROM tbluser WHERE empnum=' '";
			$us2 = mysql_query($us1);
			
			$z1 =  "SELECT * FROM tblpay WHERE empnum=' '";
			$z2 = mysql_query($z1);
		}
			
?>
	
	
<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="embelish/timestate.css"></link>
<script type="text/javascript">
	<!--
	function checker() {
		var y = document.getElementById('txtLog');
		var x = document.getElementById('txtEmp').value;
		
		var m1 = document.getElementById('txtM1');
		var m2 = document.getElementById('txtM2');
		var d1 = document.getElementById('txtD1');
		var d2 = document.getElementById('txtD2');
		var y1 = document.getElementById('txtY1');
		var y2 = document.getElementById('txtY2');
		
		
		
		if(y.options.selectedIndex==0 && x=='') {
			alert("Please enter employee number for TIME-IN");
			exit();
		}
		else if(y.options.selectedIndex==1 && x=='') {
			alert("Please enter employee number for TIME-OUT");
		}
		
		else if(y.options.selectedIndex==1 && x!='') {
			if(m1.options.selectedIndex==0) {
				alert("Enter First Month!");
			}
			if(m2.options.selectedIndex==0) {
				alert("Enter Second Month!");
			}
			if(d1.options.selectedIndex==0) {
				alert("Enter Day 1!");
			}
			if(d2.options.selectedIndex==0) {
				alert("Enter Day 2!");
			}
			if(y1.options.selectedIndex==0) {
				alert("Enter Year 1!");
			}
			if(y2.options.selectedIndex==0) {
				alert("Enter Year 2!");
			}
			
		}
	}
		
	// Print function
	function pagers(elementId) 	{
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
		<div id="head">Time Statement</div>
		<div id="menu">
			<ul>
				<?php include("home_link.php");?>
			</ul>
		</div>
		
		<div id="content">
			<div id="t1">
			<table>
				<tr>
					<td> 
						<select name="txtLog" id="txtLog" size="1">
							<option>In</option>
							<option>Out</option>
							<option>All</option>
						</select>
					
					<input type="text" name="txtEmp" id="txtEmp" size="40" placeholder="Enter employee number to monitor">
					<input type="submit" name="btnSnd" id="btnSnd" value="Send" onclick="checker()">
					<input type="submit" name="btnRst" id="btnRst" value="Reset">
					</td>
				</tr>
			</table>
			</div>
			
			<table style="font-size:14px;width:100%">
				<tr>
					<td style="text-align:center;background:#8D38C9;color:#FFF;">
					<b style="color:#FFFF00;text-decoration:blink" >NOTE:</b> Drop down date is
					only use if "OUT" option is selected!</td>
				</tr>
			</table>
		
			<table border="1" width="100%">
				<tr style="text-align:center">
					<td style="background:#FFFF00">FROM:</td>
					<td>Month:
						<select name="txtM1" id="txtM1" size="1">
						<option>---</option>
						<option>January</option><option>February</option><option>March</option>
						<option>April</option><option>May</option><option>June</option>
						<option>July</option><option>August</option><option>September</option>
						<option>October</option><option>November</option><option>December</option>
						</select>
					</td>
					<td>Day:
						<select name="txtD1" id="txtD1" size="1">
						<option>---</option>
						<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
						<option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
						<option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
						<option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
						<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
						<option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
						</select>
					</td>
					<td>Year:
						<select name="txtY1" id="txtY1" size="1">
						<option>---</option>
						<option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option>
						<option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option>
						<option>2021</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option>
						<option>2026</option><option>2027</option><option>2028</option><option>2029</option><option>2030</option>
						</select>
					</td>
					<td style="background:#FFFF00">TO:</td>
					<td>Month:
						<select name="txtM2" id="txtM2" size="1">
						<option>---</option>
						<option>January</option><option>February</option><option>March</option>
						<option>April</option><option>May</option><option>June</option>
						<option>July</option><option>August</option><option>September</option>
						<option>October</option><option>November</option><option>December</option>
						</select>
					</td>
					<td>Day:
						<select name="txtD2" id="txtD2" size="1">
						<option>---</option>
						<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
						<option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
						<option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
						<option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
						<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
						<option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
						</select>
					</td>
					<td>Year:
						<select name="txtY2" id="txtY2" size="1">
						<option>---</option>
						<option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option>
						<option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option>
						<option>2021</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option>
						<option>2026</option><option>2027</option><option>2028</option><option>2029</option><option>2030</option>
						</select>
					</td>
				</tr>
			</table><br>
			
			<!-- Use for employee data display -->
			<?php $row=mysql_fetch_assoc($us2) ?>
			<?php $row1=mysql_fetch_assoc($z2) ?>
			
			<table>
				<tr>
					<td>School:&nbsp;</td>
					<td><input type="text" size="40" value="Saint Joseph College of Bulacan"></td>
				</tr>
				<tr>
					<td>Employee:&nbsp;</td>
					<td><input type="text" name="txtNme" id="txtNme" size="40" value="<?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']?>"></td>
				</tr>
				
				<tr>
					<td>Department:&nbsp;</td>
					<td><input type="text" name="txtDep" id="txtDep" size="40" value="<?php echo $row1['dept']?>"></td>
				</tr>
				<tr>
					<td>EMP #:&nbsp;</td>
					<td><input type="text" name="txtNum" id="txtNum" size="40"size="40" value="<?php echo $row1['empnum']?>"></td>
				</tr>
			</table>
			
			
			<div id="t2">
			<?php
			// Convert numeric to character, accessing using index array
			$m_a1=array("---"=>"---","1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June",
							"7"=>"July","8"=>"August","9"=>"September","10"=>"October","11"=>"November","12"=>"December");
			
			$m_a2=array("---"=>"---","1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June",
							"7"=>"July","8"=>"August","9"=>"September","10"=>"October","11"=>"November","12"=>"December");
			
			// Value convertion came from date picker above
			$m1=$m_a1[$month1];
			$m2=$m_a2[$month2];
			$zd1_u = $zd1;
			$zd2_u = $zd2;
			$y1_u  = $y1;
			$y2_u  = $y2;
			?>
			
			
			<button onclick="JavaScript:pagers('print1');">
			<b style="font-size:16px;">PRINT</b></button>
			
			<!--Display the date evaluation period -->
			<div id='print1'>
			<?php echo "<center><b style='font-size:15px'>Evaluation period: FROM".' '.$m1.' '.$zd1_u.' '.$y1_u.' '."TO".' '.$m2.' '.$zd2_u.' '.$y2_u."</center></b>"?><br>
			
				<table>
					<tr id="P2">
						<td>#</td>
						<td>EMP</td>
						<td>Date</td>
						<td>Time-In</td>
						<td>Time-Out</td>
						<td>Total</td>
					</tr>
			
				<!-- Display total time came from tblrecord -->
				<?php $rows=mysql_fetch_assoc($s2) ?>	
				<?php
					$cntr=0;
					//Select data from tblrecord and comparing the empnum
					while($row=mysql_fetch_assoc($q2)) {
					$cntr++;
				?>
					<tr>
						<td><?php echo $cntr?></td>
						<td><?php echo $row['lname'].' '. $row['fname'].' '.$row['mname']?></td>
						<td><?php echo $row['date'];?></td>
						<td><?php echo $row['timein'];?></td>
						<td><?php echo $row['timeout'];?></td>
						<td><?php echo $row['timeset'];?></td>
					</tr>
					
				<?php
					}
				?>
				
				</table> <br>
			
			Total Time:<input type="text" name="txtSet" id="txtSet" size="20" value="<?php echo $rows['total'] ;?>">&nbsp;&nbsp;&nbsp;
			</div><br>
			<center>
			<a href="payslip.php?id=<?php echo $row1['empnum']?>&id2=<?php echo $rows['total'] ;?>" style="text-decoration:none">PaySlip</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="accumulate.php" style="text-decoration:none">Overall</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="individual.php" style="text-decoration:none">Invidiual</a>	<br><br>
			</center>
			
			
					
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