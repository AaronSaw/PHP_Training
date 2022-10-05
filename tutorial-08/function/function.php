<?php
date_default_timezone_set('Asia/Yangon');
function conn(){
  return  mysqli_connect("localhost","root","777236","test");
  }

function runQuery($sql)
{
    $conn = conn(); //single connection
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        die("Db error" . mysqli_error($conn));
    }
}

function fetchAll($sql)
{
  $conn=conn();
    $query = mysqli_query($conn,$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($rows, $row);
    }
    return $rows;
}
function fetch($sql)
{

    $query = mysqli_query(conn(), $sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}
function linkTo($l)
{
    header("location:$l");
}
function textFilter($text)
{
    $text = trim($text);
    $text = htmlentities($text, ENT_QUOTES);
    $text = stripslashes($text);
    return $text;
}

//student
function studentAdd()
{
    $name =textFilter( $_POST['name']);
    $age  =textFilter($_POST['age']) ;
    $gender=$_POST['gender'];
    $room=textFilter($_POST['room']) ;
    $address=textFilter($_POST['address']);
    $sql = "INSERT INTO students(name,age,gender,room,address) VALUES ('$name','$age','$gender','$room','$address')";
    if (runQuery($sql)) {
        linkTo('student.php');
    }
  }
  function student($id)
  {
      $sql = "SELECT * FROM students WHERE id=$id";
  
      return fetch($sql);
  }
  function students()
  {
      $sql = "SELECT * FROM students";
  
    return fetchAll($sql);
  }
  function studentDelete($id)
  {
      $sql = "DELETE FROM students WHERE id='$id'";
      return runQuery($sql);
  }
  function studentUpdate()
  {
      $id=$_POST['id'];
      $name =textFilter($_POST['name'])  ;
      $age = textFilter($_POST['age']) ;
      $gender=$_POST['gender'] ;
      $room= textFilter($_POST['room']) ;
      $address=textFilter($_POST['address']);
      $sql = "UPDATE students SET name='$name',age='$age',gender='$gender',room='$room',address='$address' WHERE id=$id";
      return runQuery($sql);
  }