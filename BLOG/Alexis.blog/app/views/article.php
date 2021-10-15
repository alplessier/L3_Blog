<?php
$id = $_GET['id'];
include '../models/fonction.php';
require '../db/dbConnect.php';

$articles = getAllArticles();
$users = getAllUsers();
$comments = getAllComments();

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
      
      <title>Article</title>
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
            <a class="deco" href="../models/deconnexion.php"><?php echo $_SESSION['username'] ?> - (déconnexion)</a> &nbsp;
            <a class="main" href="index.view.php">Accueil</a> &nbsp;
            <a class="com"  href="compte.php?id=<?php echo $id_user['id']?>">Mon Compte</a>
         </div>
         <br>
      <?php endif ?>

      <?php 

      // MENU NAVIGATION STYLE -> DECONNECTE
      if(!isset($_SESSION['username'])): ?>
         <div class="topnav" id="myTopnav">
            <a class="main" href="index.view.php">Accueil</a>&nbsp;
            <a class ="reg" href="register.php">Enregistrement</a>&nbsp;
            <a class="con" href="connexion.php">Connexion</a>&nbsp;
         </div>
         <br>
      </div>
      <?php endif ?>



      <!-- LISTE LES ARTICLES -->
      <?php foreach($articles as $article): ?>
         <?php 
         $req = $pdo->prepare('SELECT username FROM users WHERE id= ?');
         $req -> execute(array($article -> user_id));
         $reponse = $req->fetch(); 
         ?>

         <!--CONTENU-->
         <?php if($article -> id == $id): ?>
            <section class="sectionArticle">
               <br><div id="article"><span id="titre"><?php echo $article -> title ?></span><br>
               Par <?php echo $reponse['username'] ?> publié le <?php echo $article -> created_at ?><br><br></div><br>
               <span id="article1"><?php echo $article -> content ?><br><br></span>

               <!-- SI PROPRIETAIRE, MODIFIE/SUPPRIME ARTICLE -->
               <?php if(isset($_SESSION['username'])): ?>
                  <?php if($reponse['username'] == $_SESSION['username']): ?>
                     <div id="outer">
                        <form action="../models/modifTitre.view.php" method="post">
                           <input type="hidden" name="article_id" value=<?php echo $article -> id ?>>
                           <input type="submit" name="Modifier" value="Modifier Article" class="boutton" id="bouttonModif">
                        </form>
                        
                        <form action="../models/suppArticle.php" method="post">
                           <input type="hidden" name="article_id" value=<?php echo $article -> id ?>/>
                           <input type="submit" name="Supprimer" value="Supprimer Article" class="boutton" id="bouttonSupp">
                        </form>
                     </div>
                  <?php endif ?>
               <?php endif ?>
            </section>   
         <?php endif ?>
      <?php endforeach ?>
         
      <br><br>              
      <div id="comm">
         <h1 id="register">Commentaires</h1>

         <!-- AFFICHE LES COMMENTAIRES DE L'ARTICLE -->
         <?php foreach($comments as $comment): ?>
            <?php if($comment -> article_id == $id): ?>
               <div id="comm1">
                  <div id="article"> Par  <?php echo $comment -> pseudo ?> - Le <?php echo $comment -> created_at ?><br><br></div><br>
                  <span id="article1"><?php echo $comment -> content ?></span><br><br>
               

                  <!-- SI PROPRIETAIRE, MODIFIE/SUPPRIME COMMENTAIRE -->
                  <?php if(isset($_SESSION['username'])): ?>
                     <?php if($comment -> pseudo == $_SESSION['username']): ?>
                        <div id="outerC"><br><br>
                           <form action="modifComment.view.php" method="post">
                              <input type="hidden" name="id" value=<?php echo $comment -> id ?>/>
                              <input type="hidden" name="article_id" value=<?php echo $comment -> article_id ?>/>
                              <input type="submit" name="Modifier" value="Modifier Commentaire" class="boutton" id="bouttonModif">
                           </form>

                           <form action="../models/suppComment.php" method="post">
                              <input type="hidden" name="comment_id" value=<?php echo $comment -> id ?>/>
                              <input type="submit" name="Supprimer" value="Supprimer Commentaire" class="boutton" id="bouttonSupp"/>
                           </form>
                        </div><br><br>
                     <?php endif ?>
                  <?php endif ?>
               </div>
            <?php endif ?>
         <?php endforeach ?>
      </div>


      <!-- Peut publier commentaire si connecter -->
      <?php if(isset($_SESSION['username']) && $role !="Ban"): ?>

         <section class="section">
            <h1 id="newArticle">Nouveau commentaire</h1><br>
            <form action="../models/recupComm.php" method="post">
            <input type="hidden" name="article_id" value=<?php echo $article -> id ?>/>
            <p>
               <label for="content"></label>
               <textarea type="content" rows=5 cols=40 name="content" id="content" placeholder = "Contenu du commentaire"></textarea>
            </p>

            <p>
               <input type="submit" value="Publier" class="boutton" >
            </p>

            <br>
            </form>
         </section>
      <?php endif ?>

      <!-- FOOTER -->
      <footer>
            <small>&copy; Copyright 2020, Alexis PLESSIER </small>
      </footer>

   </body>
</html>