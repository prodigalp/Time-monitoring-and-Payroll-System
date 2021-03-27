<?php
session_start();
include("config.php");
$act = $_POST['txtNme'];
unset($_SESSION['ctrl']);
unset($_SESSION['name']);
unset($_SESSION['gtyp']);
unset($_SESSION['role']);
unset($_SESSION['usr']);
unset($_SESSION['pwd']);
?>

<html>
<head>
<title>Log-out</title>
</head>
<body>
	<center>
	<br><br><br><br><br>
	<?php echo "<b>" .$act. "</b>" ?>
	<label>&nbsp;Successfully Log-out!</label></br>
	<label><a href="index.php">Log-in Again</a></label></br>
	</center>
</body>
</html>