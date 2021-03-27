<?php
	if(isset($_POST['btnSnd'])) {
		if("Add Instructor"==$_POST['btnSnd']) {
			$sch = $_POST['txtSch'];
			$fnm = $_POST['txtFnm'];
			$mnm = $_POST['txtMnm'];
			$lnm = $_POST['txtLnm'];
			$usr = $_POST['txtUsr'];
			$pwd = md5($_POST['txtPas']);
			$grp = $_POST['txtGrp'];
			$rol = $_POST['opnRol'];
			
			$emp = $_POST['txtEmp'];
			$dep = $_POST['txtDep'];
			$ms  = $_POST['txtMs'];
			$sss = $_POST['txtSS'];
			$tin = $_POST['txtTin'];
			$ssd = $_POST['txtSde'];
			$txd = $_POST['txtTde'];
			$phd = $_POST['txtPhd'];
			$rpd = $_POST['txtRyt'];
			$rem = $_POST['txtRem'];
			$ski = $_POST['txtIn'];
			$sko = $_POST['txtOut'];
			
			$eml = $_POST['txtEml'];
			$con = $_POST['txtCon'];
			
			$q1 = "INSERT INTO tbluser(fname,lname,mname,username,password,gtype,role,empnum)
				  VALUES('$fnm','$lnm','$mnm','$usr','$pwd','$grp','$rol','$emp')";
			mysql_query($q1);
			
			$q2 = "INSERT INTO tblpay(empnum,school,dept,ms,dater,timer,sked_in,sked_out,rpd,sss,tin,sssd,taxd,phid,remarks)
				  VALUES('$emp','$sch','$dep','$ms',current_date(),current_time(),'$ski','$sko','$rpd','$sss','$tin','$ssd','$txd','$phd','$rem')";
			mysql_query($q2);
			
			
			$q3 = "INSERT INTO tblprof(empnum,email,contactnum)
				  VALUES('$emp','$eml','$con')";
			mysql_query($q3);
			
		}
	}

?>