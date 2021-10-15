<?php

// Recupere la connexion à la DB
require 'dbConnect.php';

$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec("TRUNCATE articles_comments");
$pdo->exec("TRUNCATE articles_categories");
$pdo->exec("TRUNCATE users_articles");
$pdo->exec("TRUNCATE users");
$pdo->exec("TRUNCATE articles");
$pdo->exec("TRUNCATE comments");
$pdo->exec("TRUNCATE categories");
$pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

echo 'DB Tables Cleanned !';