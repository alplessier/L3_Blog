<?php

session_start();

$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

if($pseudo !="" && $password != "")
{
   require '../db/dbConnect.php';

   $req = $pdo->prepare("SELECT password FROM users WHERE username= ?");
   $req->execute(array($pseudo));
   $insertion = $req->fetch();

   if($insertion && password_verify($password, $insertion['password'])) 
   {
      $_SESSION['username'] = $pseudo;
      header("Location: ../views/index.view.php");
   }
   else
   {
      header("Location: ../views/errConnexion.php");
   }
}

