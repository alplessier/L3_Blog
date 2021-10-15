<?php require '../db/dbConnect.php';
   
      $c = 0;
      require_once('fonction.php');
         $vars = getAllUsers();
         foreach($vars as $var):
            if($_POST['pseudo'] == $var->username)
            {
               $c = $c+1;
            }
         endforeach;
         
         if($c == 1)
         {
            //PSEUDO PRIS
            header("Location:../views/errRegisterUsername.php");
         }
         elseif($_POST['password'] != $_POST['password2'])
         {
            //MDPs Differents
            header("Location: ../views/errRegisterMdp.php");
         }
         else
         {
            //AJOUT USER BDD
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);                         //HASH PSW
            $insertion = "INSERT INTO users (username,password) VALUES ('$pseudo','$hash')";
            $execute = $pdo->query($insertion);
            header("Location: ../views/connexion.php");
         }
      
?>


</body>
</html>