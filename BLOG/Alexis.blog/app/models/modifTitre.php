<?php require '../db/dbConnect.php';
   
session_start();

$pseudo = $_SESSION['username'];
$title = $_POST['title'];
$content = $_POST['content'];
$article_id = $_POST['article_id'];

// MET LE TITRE ET LE CONTENU A JOUR
$req = $pdo->prepare('UPDATE articles SET title = ?, content = ? WHERE id = ?');
$req->execute(array($title,$content,$article_id));

header('Location: ../views/article.php?id='.$article_id);

