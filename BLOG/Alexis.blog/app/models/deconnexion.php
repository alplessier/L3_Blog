<?php 
session_start();
session_destroy();
header("Location: ../views/index.view.php");

?>

