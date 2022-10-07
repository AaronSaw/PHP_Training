<?php
require "connect/connection.php";
$sql = "CREATE TABLE login (
     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email varchar(255) DEFAULT NULL,
    password varchar(255) DEFAULT NULL,
    status int(11) NOT NULL
  ) ";
if ($connect->query($sql) === TRUE) {
    echo "Table MyData created successfully";
} else {
    echo "Error creating table: " . $connect->error;
}
