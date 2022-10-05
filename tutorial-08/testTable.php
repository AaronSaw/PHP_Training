<?php
require "function/function.php";

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
