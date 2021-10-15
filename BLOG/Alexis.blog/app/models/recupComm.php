<?php require '../db/dbConnect.php';
   
session_start();

$pseudo = $_SESSION['username'];


if($_POST['content'] != "")  //CONDITIONS INSCRIPTIONS
{
   $req1 = $pdo->prepare('INSERT INTO comments (article_id,pseudo,content,created_at) VALUES (?,?,?,NOW())');
   $req1 ->execute(array($_POST['article_id'],$pseudo, $_POST['content']));
}

header('Location: ../views/article.php?id='.$_POST['article_id']);
$reponse->closeCursor();

?>