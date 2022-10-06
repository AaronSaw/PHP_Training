<?php
require "function/function.php";
$id = $_GET['id'];
if (studentDelete($id)) {
    linkTo("student_list.php");
}
