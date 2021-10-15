<?php
include '../models/fonction.php';

session_start();
?>

<!DOCTYPE html>

<html lang="fr">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style3.css"/>

      <title>Connexion</title>
   </head>
      

   <body>

      <!--MENU DIRECTIONS-->
      <a href="top"></a>
      
      <!-- MENU NAVIGATION STYLE -> DECONNECTE -->
      <?php if(!isset($_SESSION['username'])): ?>
         <div class="topnav" id="myTopnav">
            <a class="main"  href="index.view.php">Accueil</a>&nbsp;
            <a class ="reg"  href="register.php">Enregistrement</a>&nbsp;
            <a class="con" id="active"  href="connexion.php">Connexion</a>&nbsp;
         </div>
         <br>
      </div>
      <?php endif ?>
   
      <section class="section">

         <h1 id="conn">Connexion</h1>

         <form action="../models/recupConnexion.php" method="post">

            <span id="pseudo">
                  <label id="pseudo" for="pseudo">Pseudo</label>
                  <input type="text" maxlength="20" name="pseudo" id="pseudo" required><br><br>
                  
                  </span>
            
            <span id="password">
               <label id="password" for="userpwd">Mot de passe</label>
               <input type="password" name="password" id="password" required>
            </span>

            <p>
               <br><input type="submit" value="Se connecter" class="boutton" id="register">
            </p>
         </form>
      </section>

      <!-- FOOTER -->
      <footer>
            <small>&copy; Copyright 2020, Alexis PLESSIER </small>
      </footer>
   </body>
</html>
