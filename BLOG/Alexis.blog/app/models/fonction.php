<?php

function getAllArticles()
{
   require(__DIR__."/../db/dbConnect.php");
   $reponse = $pdo->prepare('SELECT * FROM articles ORDER BY id DESC');
   $reponse->execute();
   $donnees  =$reponse->fetchALL(PDO::FETCH_OBJ);
   return $donnees;
   $reponse ->closeCursor();
}


function getAllUsers()
{
   require '../db/dbConnect.php';
   $reponse = $pdo->prepare('SELECT * FROM users');
   $reponse->execute();
   $donnees = $reponse->fetchALL(PDO::FETCH_OBJ);
   return $donnees;
   $reponse ->closeCursor();
}

function getAllComments()
{
   require '../db/dbConnect.php';
   $reponse = $pdo->prepare('SELECT * FROM comments ORDER BY id ASC');
   $reponse->execute();
   $donnees  =$reponse->fetchALL(PDO::FETCH_OBJ);
   return $donnees;
   $reponse ->closeCursor();
}


function choixMembre()
{
   $users = getAllUsers();


   echo'<select name="Membre">';
      echo'<option value="" disabled selected>Choisir un membre</option>';
      foreach($users as $user)
      {
         if($user -> role != "Admin")
         {
            echo '<option value='.($user -> username).'>'.($user -> username).'</option>';
         }
         
      }

   echo'</select>';
   
}

function choixStatue()
{
   
   echo'<select name="Statue">';
      echo'<option value="" disabled selected>Choisir un role</option>';

         echo '<option value="Admin">Admin</option>';
         echo '<option value="Subscriber">Subscriber</option>';
         echo '<option value="Ban">Ban</option>';
   echo'</select>';
}
