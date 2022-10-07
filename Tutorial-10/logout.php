<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header("location:index.php");
}
session_unset();
header("location:index.php");
