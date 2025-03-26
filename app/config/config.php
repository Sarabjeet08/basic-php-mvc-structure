<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'sarab');
define('DB_PASS', '1234<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>');
define('DB_NAME', 'my_database');

