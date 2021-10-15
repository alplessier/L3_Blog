<?php
require '../db/dbConnect.php';
include 'fonction.php';

session_start();

$pseudo = $_SESSION['username'];


//SUPPRESSION DE TOUT CE QUI A UN LIEN AVEC LE COMPTE
$users = getAllUsers();

//SUPPRIME TOUS LES COMMENTAIRES DE L'UTILISATEUR
$comms = getAllComments();
foreach($comms as $comm)
{
   if($comm -> pseudo == $pseudo)
   {
      $req = $pdo->prepare('DELETE FROM comments WHERE pseudo = ?');
      $req->execute(array($pseudo));
   }
}



//SUPPRIME LES ARTICLES ET LES COMMENTAIRES DE CES ARTICLES
$articles = getAllArticles();


$id = $pdo->prepare('SELECT id FROM users WHERE username= ?');
$id -> execute(array($pseudo));
$reponse = $id->fetch();

foreach($articles as $article)
{
   if($article -> user_id == $reponse['id'])
   {
      // SUPPRIME TOUS LES COMMENTAIRE D'ARTICLE DE L'UTILISATEUR A SUPP
      $a_i = $article -> id;
      $comms = getAllComments();
      foreach($comms as $com)
      {
         if($com -> article_id == $a_i)
         {
            $req1 = $pdo->prepare('DELETE FROM comments WHERE article_id = ?');
            $req1->execute(array($a_i));
         }
      }

      //SUPPRIME L'ARTICLE DE L'UTILISATEUR
      $req = $pdo->prepare('DELETE FROM articles WHERE user_id = ?');
      $req->execute(array($reponse['id']));
   }
}



//SUPPRIME L'UTILISATEUR
foreach($users as $user)
{
   if($user -> username == $_SESSION['username'])
   {
      $req = $pdo->prepare('DELETE FROM users WHERE username = ?');
      $req->execute(array($pseudo));
   }
}

session_destroy();
header("Location: ../views/index.view.php");
?>