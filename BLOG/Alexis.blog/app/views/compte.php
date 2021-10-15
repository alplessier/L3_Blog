<?php
include '../models/fonction.php';
require '../db/dbConnect.php';
session_start();

$articles = getAllArticles();

$id = $_GET['id'];


//RECUPERE LE NOMBRE D'ARTICLES DE L'UTILISATEUR
$req3 = $pdo->prepare('SELECT COUNT(*) FROM articles WHERE user_id = ?');
$req3->execute(array($id));
$nbrArt = $req3->fetch();
?>

<!DOCTYPE html>

<html lang="fr">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style3.css"/>

      <title>Compte</title>
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
            <a class="main"  href="index.view.php">Accueil</a> &nbsp;
            <a class="com" id="active"  href="compte.php?id=<?php echo $id_user['id']?>">Mon Compte</a>
         </div>
         <br>
      <?php endif ?>
      
      <!-- MENU NAVIGATION STYLE -> DECONNECTE -->
      <?php if(!isset($_SESSION['username'])): ?>
         <div class="topnav" id="myTopnav">
            <a class="main"  href="index.view.php">Accueil</a>&nbsp;
            <a class ="reg"  href="register.php">Enregistrement</a>&nbsp;
            <a class="con"   href="connexion.php">Connexion</a>&nbsp;
         </div>
         <br>
      </div>
      <?php endif ?>

      <!-- RECUPERE LE PSEUDO AVEC L'ID DE L'USER DANS L'URI -->
      <?php 
      $req2 = $pdo->prepare('SELECT username FROM users WHERE id= ?');
      $req2 -> execute(array($id));
      $username = $req2->fetch();
      ?>
      <section class="section">

         <h1 id="newArticle">Compte de <span id="nom"><?php echo $username['username'] ?></span></h1>
         <?php
         
         // RECUPERE LE ROLE AVEC L'ID DE L'USER DANS L'URI
         $req = $pdo->prepare('SELECT role FROM users WHERE id= ?');
         $req -> execute(array($id));
         $role = $req->fetch();

         // RECUPERE LA DATE DE CREATION AVEC L'ID DE L'USER DANS L'URI
         $req1 = $pdo->prepare('SELECT created_at FROM users WHERE id= ?');
         $req1 -> execute(array($id));
         $created_at = $req1->fetch(); ?>
   
         <!-- AFFICHAGE INFORMATIONS -->
         <br>
         <p>Pseudo : <?php echo $username['username'] ?></p>
         <p>Role : <?php echo $role['role'] ?><p>
         <p>Créé le  : <?php echo $created_at['created_at'] ?><p><br>


         <?php if(isset($_SESSION['username']) && $_SESSION['username'] == $username['username']):?>
            <form action="../models/suppCompte.php" method="post">  
               <p>
                  <input type="submit" value="Supprimer le compte" class="boutton" id="supp" >
               </p>
            </form>
         <?php endif ?>
      </section>

   


      <!-- AFFICHAGE DES ARTICLES DE L'UTILISATEUR -->
      <section class="section">
         <!-- SI PAS D'ARTICLE, AFFICHAGE DIFFERENT -->
         <?php if($nbrArt['COUNT(*)'] == 0) : ?>
            <br><p>Aucun Article ecrit par <span id="nom"><?php echo $_SESSION['username'] ?></span></p>
         <?php elseif($nbrArt['COUNT(*)'] > 0) : ?>
            <h1 id="newArticle">Articles de  <span id="nom"><?php echo $username['username'] ?></span></h1>

            <table id="table">
               <tr>
                  <th>Sujet</th>
                  <th>Auteur</th>
                  <th>Date de création</th>
               </tr>

               <?php $articles = getAllArticles();
               foreach($articles as $article): 
                  if($article -> user_id == $id): 
                     
                     $req = $pdo->prepare('SELECT username FROM users WHERE id= ?');
                     $req -> execute(array($article -> user_id));
                     $reponse = $req->fetch(); ?>


                     <tr>
                        <td><a href="article.php?id=<?php echo $article -> id?>"><?php echo $article -> title ?></a></td>
                        <td><a href="compte.php?id=<?php echo $article -> user_id?>"><?php echo $reponse['username'] ?></a></td>
                        <td><?php echo $article -> created_at ?></td>
                     </tr>
                  <?php endif ?>
               <?php endforeach ?>
            </table>
         <?php endif ?>
      </section>

      <!-- /!\ SI ADMIN /!\ -->
      <?php if(isset($_SESSION['username'])): ?>
         <?php if($role['role'] == "Admin" && $username['username'] == $_SESSION['username']): ?>
            <section class="section">
               <!--CHANGEMENT DE ROLE (SAUF ADMIN)-->
               <h1 id="newArticle">Gestion des membres</h1><br>
               <form action="../models/changeStatue.php" method="post" id="line"> 
                     <p>Change le statue de <?php choixMembre(); ?> en <?php  choixStatue() ?>
                     <input type="submit" value="Changer" class="boutton" id="changer"></p>
               </form>
               
               <!--SUPPRIMER UN MEMBRE (SAUF ADMIN)-->
               <form action="../models/suppParAdmin.php" method="post" id="line">
                  
                  <p>Supprimer le membre <?php choixMembre() ?>
                     <input type="submit" value="Supprimer" class="boutton" id="supp1"  >
                  </p>
               </form>
            </section>
         <?php endif ?>
      <?php endif ?>

      <!-- FOOTER -->
      <footer>
            <small>&copy; Copyright 2020, Alexis PLESSIER </small>
      </footer>

   </body>
</html>
