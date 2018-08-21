<?php 
$dsn = 'mysql:dbname=mysql;host=10.0.0.21;port=3306charset=utf8';
$user = 'root';
$password = '123456';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "Percona Master connected !<br>";

    $dbh->exec("drop table if exists test_slave;");
    $dbh->exec("create table test_slave 
        ( 
            `id` int(11) not null auto_increment, 
            PRIMARY KEY (`id`)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    $id = rand(1,9999);
    $dbh->exec("insert into test_slave (id) values (".$id.");");

    echo "create table on master; insert row id: {$id}; <br>";

} catch (PDOException $e) {
    echo 'Master Connection failed: ' . $e->getMessage();
}


echo "sleep 1 second for replication; <br>";
sleep(1);

$dsn = 'mysql:dbname=mysql;host=10.0.0.22;port=3306charset=utf8';
$user = 'root';
$password = '123456';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "Percona Slave connected !<br>";

    $stmt = $dbh->prepare("select * from test_slave;");
    $stmt->execute();

    var_dump($stmt->fetch(PDO::FETCH_ASSOC));

} catch (PDOException $e) {
    echo 'Slave Connection failed: ' . $e->getMessage();
}