<?php require '../db/dbConnect.php';
   
session_start();

$pseudo = $_SESSION['username'];
$comment_id = $_POST['comment_id'];
$content = $_POST['content'];


// MET LE CONTENU A JOUR
$req = $pdo->prepare('UPDATE comments SET content = ? WHERE id = ?');
$req->execute(array($content,$comment_id));

// ARTICLE_ID

$req2 = $pdo->prepare('SELECT article_id FROM comments WHERE id = ?');
$req2->execute(array($comment_id));
$reponse = $req2->fetch();

header('Location: ../views/article.php?id='.$reponse['article_id']);

?>

