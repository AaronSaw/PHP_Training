<?php
session_start();
if (!isset($_SESSION['mail'])) {
	header("location:index.php");
}
?>
<h1>Success</h1>
<a href="logout.php">logout</a>
