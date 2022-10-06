<?php
date_default_timezone_set('Asia/Yangon');
function conn()
{
    return  mysqli_connect("localhost", "root", "777236", "test");
}
function createTable()
{
    $sql = "CREATE TABLE students (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age  INT(6) NOT NULL,
    gender ENUM('female','male') NOT NULL,
    room  VARCHAR(255) NOT NULL,
    address  VARCHAR(255) NOT NULL
    )";

    if (conn()->query($sql) === TRUE) {
        echo "Table MyData created successfully";
    } else {
        echo "Error creating table: " . conn()->error;
    }
}

//Run
function runQuery($sql)
{
    $conn = conn(); //single connection
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        die("Db error" . mysqli_error($conn));
    }
}
/**
 * Show age 
 * @param $sql 
 * @return $rows
 */
function fetchAll($sql)
{
    $conn = conn();
    $query = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($rows, $row);
    }
    return $rows;
}
/**
 * Show age 
 * @param $sql
 * @return $row
 */
function fetch($sql)
{

    $query = mysqli_query(conn(), $sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}
//locator
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
function forwardTo($l)
{
    echo "<script>doucment.location='$l'</script>";
}

//students table CRUD
function studentAdd()
{
    $name = textFilter($_POST['name']);
    $age  = textFilter($_POST['age']);
    $gender = $_POST['gender'];
    $room = textFilter($_POST['room']);
    $address = textFilter($_POST['address']);
    $sql = "INSERT INTO students(name,age,gender,room,address) VALUES ('$name','$age','$gender','$room','$address')";
    if (runQuery($sql)) {
        linkTo('student_list.php');
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
    $id = $_POST['id'];
    $name = textFilter($_POST['name']);
    $age = textFilter($_POST['age']);
    $gender = $_POST['gender'];
    $room = textFilter($_POST['room']);
    $address = textFilter($_POST['address']);
    $sql = "UPDATE students SET name='$name',age='$age',gender='$gender',room='$room',address='$address' WHERE id=$id";
    return runQuery($sql);
}
