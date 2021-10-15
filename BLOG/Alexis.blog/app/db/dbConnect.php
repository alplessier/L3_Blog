<?php

$host = '127.0.0.1';
$bdd ='blogdb_tthd';
$user = 'root';
$psw = 'blogdb';
$port = '3306';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$bdd;port=$port;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $psw, $options);
}
catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), $e->getCode());
}

?>




