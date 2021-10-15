<?php
require '../db/dbConnect.php';
require 'fonction.php';
$comments = getAllComments();

$article_id = $_POST['article_id'];

//SUPPRESSION COMMENTAIRES DE L'ARTICLE A SUPPRIMER
foreach($comments as $comment)
{
   if($comment -> article_id == $article_id)
   {
      $req1 = $pdo->prepare('DELETE FROM comments WHERE article_id=? ');
      $req1->execute(array($article_id));
   }
}

$req2 = $pdo->prepare('DELETE FROM articles WHERE id=? ');
$req2 -> execute(array($article_id));

header('Location: ../views/index.php');
?>