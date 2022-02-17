<?php
$link = mysqli_connect('localhost', 'root', 'root','picture');
$actionLike = false;

require_once('model/gallery.php');
if($_GET['act'] == 0)
  increase_views($link, $_GET['id']);
$photo = gallery_item($link, $_GET['id']);
if(isset($_POST['like'])){
  increase_like($link, $photo);
}
elseif (isset($_POST['dislike']))
  increase_dislike($link, $photo);
$actionLike = ($_GET['act'] == 1) ? true : false;
$title = 'Перегляд фотографії';
$content = 'templates/content_photo.php';
include 'templates/main.php';
?>