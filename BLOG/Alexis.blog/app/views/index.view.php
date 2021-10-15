<?php
/*
echo $document_root;
$a = set_include_path($document_root);
var_dump($a); */



include '../models/fonction.php';
require '../db/dbConnect.php';


session_start();

//RECUPERATION DU ROLE
if(isset($_SESSION['username']))
{
   $pseudo = $_SESSION['username'];
   $req1 = $pdo->prepare('SELECT role FROM users WHERE username=?');
   $req1->execute(array($pseudo));
   $reponse1 = $req1->fetch();
   $role = $reponse1['role'];
}
?>

<!DOCTYPE html>

<html lang="fr">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style3.css"/>
      
      <title>Mon Compte</title>
   </head>

   <body>
      <!--MENU DIRECTIONS-->
      <a href="top"></a>
      
      <?php
      // MENU NAVIGATION STYLE -> CONNECTE 
      if(isset($_SESSION['username'])):
         $req5 = $pdo->prepare('SELECT id FROM users WHERE username= ?');
         $req5->execute(array($_SESSION['username']));
         $id_user = $req5->fetch();?>

         <div class="topnav" id="myTopnav">
            <a class="deco" href="../app/models/deconnexion.php"><?php echo $_SESSION['username'] ?> - (déconnexion)</a> &nbsp;
            <a class="main" id="active" href="../app/views/index.view.php">Accueil</a> &nbsp;
            <a class="com"  href="../app/views/compte.php?id=<?php echo $id_user['id']?>">Mon Compte</a>
         </div>
         <br>
      <?php endif ?>

      <?php 

      // MENU NAVIGATION STYLE -> DECONNECTE
      if(!isset($_SESSION['username'])): ?>
         <div class="topnav" id="myTopnav">
            <a class="main" id="active" href="../app/views/index.view.php">Accueil</a>&nbsp;
            <a class ="reg" href="../app/views/register.php">Enregistrement</a>&nbsp;
            <a class="con" href="../app/views/connexion.php">Connexion</a>&nbsp;
         </div>
         <br>
      </div>
      <?php endif ?>



      <!--CONTENU-->
      <section class="section">
      <?php if(isset($_SESSION['username']) && $role != "Ban"): ?>
         <h1 id="newArticle">Nouvel Article</h1>

         <!-- Peut publier article si connecter -->
         <form action="../models/recupArticle.php" method="post">

            <p>
               <input type="text" maxlength="88" name="title" id="title" placeholder="Titre de l'article">
            </p>
                        
            <p>
               <textarea type="content" rows=6 cols=40 name="content" id="content" placeholder="Contenu de l'article"></textarea>
            </p>
                  
            <p>
               <input type="submit" value="Publier" class="boutton" >
            </p>

            <br>
         </form>
         <?php endif ?>



         <!-- AFFICHE LES TITRES/AUTEURS/DATE DE CREATION DE CHAQUE ARTICLES -->
         <h1 id="allArticles">Tous les articles</h1>
            <table id="table">
               <tr>
                  <th>Sujet</th>
                  <th>Auteur</th>
                  <th>Date de création</th>
               </tr>

               <?php $articles = getAllArticles();

               foreach($articles as $article): 

                  $req = $pdo->prepare('SELECT username FROM users WHERE id= ?');
                  $req -> execute(array($article -> user_id));
                  $reponse = $req->fetch(); ?>


                  <tr>
                     <td><a href="article.php?id=<?php echo $article -> id?>"><?php echo $article -> title ?></a></td>
                     <td><a href="compte.php?id=<?php echo $article -> user_id?>"><?php echo $reponse['username'] ?></a></td>
                     <td><?php echo $article -> created_at ?></td>
                  </tr>
               <?php endforeach ?>
            </table>

      </section>


      <!-- FOOTER -->
      <footer>
            <small>&copy; Copyright 2020, Alexis PLESSIER </small>
      </footer>
   </body>

</html>
