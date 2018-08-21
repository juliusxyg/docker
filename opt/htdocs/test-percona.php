<?php 
$dsn = 'mysql:dbname=mysql;host=10.0.0.21;port=3306charset=utf8';
$user = 'root';
$password = '123456';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "Percona Master connected !";

} catch (PDOException $e) {
    echo 'Master Connection failed: ' . $e->getMessage();
}


$dsn = 'mysql:dbname=mysql;host=10.0.0.22;port=3306charset=utf8';
$user = 'root';
$password = '123456';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "Percona Slave connected !";

} catch (PDOException $e) {
    echo 'Slave Connection failed: ' . $e->getMessage();
}