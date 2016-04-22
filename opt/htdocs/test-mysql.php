<?php 
$dsn = 'mysql:dbname=mysql;host=mysql;port=3306charset=utf8';
$user = 'root';
$password = '123456';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "Mysql connected";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}