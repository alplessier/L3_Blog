<?php

//$document_root = $_SERVER['DOCUMENT_ROOT'];

$url ='';


if(isset($_GET['url']))
{
   $url = explode('/',$_GET['url']);
}

if($url == '')
{
   require '../app/views/index.view.php';
}
else 
{
   require '../app/views/404.view.php';
}

?>