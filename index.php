<?php

$link = mysqli_connect('localhost', 'root', 'root','picture');

require_once('model/gallery.php');
if (isset($_FILES['photo']))
{
   gallery_add($link, $_FILES['photo']);
   header('Locaton: index.php');
   exit();
}   
  $photos = gallery_list($link);
  $title = 'Галерея фотографий';
  $content = ($_GET['view'] == 'list') ? 'templates/content_index_list.php' : 'templates/content_index_table.php';
  include 'templates/main.php';
?>