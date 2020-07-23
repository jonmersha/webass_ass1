<?php
require ("includes/config.inc.php");

//*************************  DROP DATABASE
// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Drop database if it exists
$sql = "DROP DATABASE ". DB_NAME ;
if ($conn->query($sql) === TRUE) {
    echo "Existing Database ". DB_NAME . " dropped successfully.<br><br>";
} 
$conn->close();

//*************************  CREATE DATABASE
// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE ". DB_NAME;
if ($conn->query($sql) === TRUE) {
    echo "Database ". DB_NAME . " created successfully.<br><br>";
} else {
    die("Error creating database: " . $conn->error);
}

$conn->close();

//********************** CREATE products TABLE

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE `" . TABLE_USERS ."` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";




if ($conn->query($sql) === TRUE) {
    echo "Table ". TABLE_USERS . " created successfully.<br><br>";
} else {
    die("Error creating table: " . $conn->error);
}
$conn->close();
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 
