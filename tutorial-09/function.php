<?php
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
/**
 * Show age 
 * @param $sql
 * @return $rows
 */
function fetchAll($sql)
{
    $query = mysqli_query(conn(), $sql);
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
/**
 * Show age 
 * @param $table
 * @param $description
 * @return $total
 */
function countTotal($table, $description = '1')
{
    $sql = "SELECT COUNT(id) as count_id FROM $table WHERE  $description";
    $total = fetch($sql);
    return $total['count_id'];
}
//student tablse
function students()
{
    $sql = "SELECT * FROM students";
    return fetchAll($sql);
}
