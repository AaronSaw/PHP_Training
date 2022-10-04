<?php
$delName = $_GET['delName'];
unlink(realpath($delName));
header("location:result.php");
