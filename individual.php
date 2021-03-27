<?php
	session_start();
	if($_SESSION['role']=='4' || $_SESSION['role']=='3' || 
       $_SESSION['role']=='2' || $_SESSION['role']=='1') {
	
	include("config.php");
	
	// Initial value of date 1
	$month1 ='---';
	$month2 ='---';
	$d1    ='x';
	$d2    ='x';
	$y1     ='----';
	$y2     ='----';
	
	if(isset($_POST['btnSnd'])) {
		if("Search"==$_POST['btnSnd']) {
			$emp = $_POST['txtEmp'];
			
			// Date use in First year entry
			$m1=$_POST['txtM1'];
			$m_a1=array("---"=>"0","January"=>"1","February"=>"2","March"=>"3","April"=>"4","May"=>"5","June"=>"6",
						"July"=>"7","August"=>"8","September"=>"9","October"=>"10","November"=>"11","December"=>"12");
			// Month 1
			$month1=$m_a1[$m1];
			$d1 = $_POST['txtD1'];
			$y1 = $_POST['txtY1'];
			
			// Date use in Second year entry
			$m2=$_POST['txtM2'];
			$m_a2=array("---"=>"0","January"=>"1","February"=>"2","March"=>"3","April"=>"4","May"=>"5","June"=>"6",
						"July"=>"7","August"=>"8","September"=>"9","October"=>"10","November"=>"11","December"=>"12");
			// Month 2
			$month2=$m_a2[$m2];
			$d2 = $_POST['txtD2'];
			$y2 = $_POST['txtY2'];
			
			//$q1 = "SELECT * FROM tblbackup";
			$q1 = "SELECT * FROM tblrecord WHERE empnum='$emp' && date>=concat('$y1','-','$month1','-','$d1') && date<=concat('$y2','-','$month2','-','$d2')";
			$q2 = mysql_query($q1);
			
			$s1 = "SELECT sec_to_time(sum(time_to_sec(timeset))) as total FROM tblrecord WHERE empnum='$emp'";
			$s2 = mysql_query($s1);
		}
	}		
	else {
		$q1 = "SELECT * FROM tblrecord WHERE empnum=' '";
		$q2 = mysql_query($q1);
		
		$s1 = "SELECT * FROM tblrecord WHERE empnum=' ' ";
		$s2 = mysql_query($s1);
	}
	
				
?>
	
	
<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="embelish/timestate.css"></link>
<script type="text/javascript">
	<!--
	function checker() {
		var x = document.getElementById('txtEmp').value;
		var m1 = document.getElementById('txtM1');
		var m2 = document.getElementById('txtM2');
		var d1 = document.getElementById('txtD1');
		var d2 = document.getElementById('txtD2');
		var y1 = document.getElementById('txtY1');
		var y2 = document.getElementById('txtY2');
		if(x=='') {
			alert("Please enter employee number to process!");
		}
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
	
	
	// Print Function
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
		<div id="head">Individual</div>
		<div id="menu">
			<ul>
				<?php include("home_link.php");?>
			</ul>
		</div>
		
		<div id="content">
			<table width="100%">
				<tr style="text-align:center">
					<td colspan="8">
					<input type="text" name="txtEmp" id="txtEmp" size="40" autocomplete="off" placeholder="Enter employee number to search">
					<input type="submit" name="btnSnd" id="btnSnd" value="Search" onclick="checker()">
					<input type="submit" name="btnRst" id="btnRst" value="Refresh">
					</td>
				</tr>
			</table><br>
			
			<table style="font-size:14px;width:100%">
				<tr>
					<td style="text-align:center;background:#00FF00">Enter range of date to search:			
					e.g. from January 1, 2010 to January 10, 2010</td>
				</tr>
			</table><br>
			
			<?php
			// Convert numeric to character, accessing using index array
			$m_a1=array("---"=>"---","1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June",
							"7"=>"July","8"=>"August","9"=>"September","10"=>"October","11"=>"November","12"=>"December");
			
			$m_a2=array("---"=>"---","1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June",
							"7"=>"July","8"=>"August","9"=>"September","10"=>"October","11"=>"November","12"=>"December");
			
			// Value convertion came from date picker above
			$m1=$m_a1[$month1];
			$m2=$m_a2[$month2];
			$zd1_u = $d1;
			$zd2_u = $d2;
			$y1_u  = $y1;
			$y2_u  = $y2;
			?>
			
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
			
			<div id='print1'>
				<!--Display the date evaluation period -->
				<?php echo "<center><b style='font-size:15px'>Evaluation period: FROM".' '.$m1.' '.$zd1_u.' '.$y1_u.' '."TO".' '.$m2.' '.$zd2_u.' '.$y2_u."</center></b>"?>
				
				<table width="100%" border="1" style="text-align:center">
					<tr style="background:#FFFF00;text-transform:uppercase;font-weight:bold">
						<td>ID</td>
						<td>Emp#</td>
						<td>Name</td>
						<td>Date</td>
						<td>Time-IN</td>
						<td>Time-OUT</td>
						<td>Time-SET</td>
					</tr>
					<?php $rows=mysql_fetch_assoc($s2) ?>	
					<?php
						while($row=mysql_fetch_assoc($q2)) {
					?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['empnum'];?></td>
						<td><?php echo $row['lname'].' '.$row['fname'].' '.$row['mname'];?></td>
						<td><?php echo $row['date'];?></td>
						<td><?php echo $row['timein'];?></td>
						<td><?php echo $row['timeout'];?></td>
						<td><?php echo $row['timeset'];?></td>
					</tr>
					
					<?php
					}
					?>
						
				
				</table><br>
				
				Total Time:<input type="text" name="txtSet" id="txtSet" size="20" value="<?php echo $rows['total'] ;?>">&nbsp;&nbsp;&nbsp;
			</div>	
			<button onclick="JavaScript:pagers('print1');"><b style="font-size:16px;">PRINT</b></button>
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