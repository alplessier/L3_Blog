<?php require '../db/dbConnect.php';
   
   session_start();

   $pseudo = $_SESSION['username'];
   $req = $pdo->prepare('SELECT id FROM users WHERE username= ?');
   $req -> execute(array($pseudo));
   $reponse = $req->fetch();


   if($_POST['title'] != "" && $_POST['content'] != "")  //CONDITIONS INSCRIPTIONS
   {
      $req1 = $pdo->prepare('INSERT INTO articles (user_id,title, content,created_at) VALUES (?,?, ?,NOW())');
      $req1 ->execute(array($reponse['id'],$_POST['title'], $_POST['content']));
   }

   header('Location: ../views/index.view.php');
   $reponse->closeCursor();
?>
