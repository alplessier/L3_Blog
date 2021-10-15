<?php
require '../db/dbConnect.php';


$comment_id = $_POST['comment_id'];
var_dump($comment_id);

$req1 = $pdo->prepare('SELECT article_id FROM comments WHERE id = ?');
$req1 -> execute(array($comment_id));
$article_id = $req1->fetch();

$req = $pdo->prepare('DELETE FROM comments WHERE id = ?');
$req -> execute(array($comment_id));

var_dump($article_id['article_id']);
header('Location: ../views/article.php?id='.$article_id['article_id']);

?>