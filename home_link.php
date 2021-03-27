<?php
if($_SESSION['role']=='1') {
	echo "<li><a href='home.php'>home</a></li>";
	echo "<li><a href='simdex.php'>time-in</a></li>";
}

if($_SESSION['role']=='2') {
	echo "<li><a href='home.php'>home</a></li>";
	echo "<li><a href='simdex.php'>time-in</a></li>";
}

if($_SESSION['role']=='3') {
	echo "<li><a href='home.php'>home</a></li>";
	echo "<li><a href='simdex.php'>time-in</a></li>";
	echo "<li><a href='view.php'>Search</a></li>";
}

if($_SESSION['role']=='4') {
	echo "<li><a href='home.php'>home</a></li>";
	echo "<li><a href='simdex.php'>time-in</a></li>";
	echo "<li><a href='view.php'>Search</a></li>";
	echo "<li><a href='add.php'>Insert</a></li>";
	echo "<li><a href='delete.php'>delete</a></li>";
	echo "<li><a href='timestate.php'>ViewLog</a></li>";
	echo "<li><a href='update.php'>update</a></li>";
}
?>