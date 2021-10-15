<?php
include '../models/fonction.php';
$articles = getAllArticles();

session_start();
?>

<!DOCTYPE html>

   <html lang="fr">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style3.css"/>
      
      <title>Enregistrement</title>
   </head>
      

   <body>

      <!--MENU DIRECTIONS-->
      <a href="top"></a>
      
      <!-- MENU NAVIGATION STYLE -> DECONNECTE -->
      <?php if(!isset($_SESSION['username'])): ?>
         <div class="topnav" id="myTopnav">
            <a class="main"  href="index.view.php">Accueil</a>&nbsp;
            <a class ="reg" id="active"  href="register.php">Enregistrement</a>&nbsp;
            <a class="con"   href="connexion.php">Connexion</a>&nbsp;
         </div>
         <br>
      </div>
      <?php endif ?>
      
      <section class="section">

         <h1 id="register">Enregistrement</h1><br>

         <form action="../models/recupEnregistrement.php" method="post">

            <span id="pseudo">
               <label id="pseudo" for="pseudo">Pseudo</label>
               <input type="text" maxlength="20" name="pseudo" id="pseudo" required><br>

            </span>
            <br>
            <span id="password">
               <label id="password" for="userpwd">Mot de passe</label>
               <input type="password" name="password" id="password" required><br>
            </span>
            <br>
            <span id="password2">
               <label id="password2" for="userpwd2">Retaper mot de passe</label>
               <input type="password" name="password2" id="password2" required>
            </span>
            <br><br>
            <div id="erreur"> Pseudo indisponible</div>
            <p>
               <br>
               <input type="submit" value="S'enregistrer" class="boutton" id="register">
            </p>
         </form>

      </section>


      <!-- FOOTER -->
      <footer>
            <small>&copy; Copyright 2020, Alexis PLESSIER </small>
      </footer>

   </body>
</html>


