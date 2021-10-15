<?php
require '../db/dbConnect.php';

$membre = $_POST['Membre'];
$statue = $_POST['Statue'];

$req = $pdo->prepare('UPDATE users SET role= ? WHERE username=?');
$req->execute(array($statue,$membre));

header("Location: ../views/compte.php");

?>
