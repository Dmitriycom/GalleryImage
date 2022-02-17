<a href="index.php">Таблиця</a> | <b>Список</b>
<br/><br/>
<?php foreach ($photos as $photo): ?>
   <a href="photo.php?id=<?=$photo['idPic']?>&act=0">
   <img src="<?=gallery_icon($photo['idPic'])?>" />
   </a>
   <br/>
<?php endforeach ?>

<br/><br/>

<form method="post" enctype="multipart/form-data">
   <input type="file" name="photo" />
   <br>
   <input type="submit" value="Завантажити файл!" />
</form>