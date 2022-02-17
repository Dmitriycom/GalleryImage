<b>Таблиця</b> | <a href="index.php?view=list">Список</a>
<br/><br/>
<table>
  <tr>
  <?php $i = 0; ?>
  <?php foreach ($photos as $photo): ?>
     <?php if ($i % 3 == 2 ): ?>
        </tr>
        <tr>
     <?php endif; ?>
     <td>
      <a href="photo.php?id=<?=$photo['idPic']?>&act=0">
      <img src="<?=gallery_icon($photo['idPic'])?>" />
      </a>
     </td>
     <?php $i++; ?>
  <?php endforeach ?>
</tr>
</table>

<br/><br/>
<form method="post" enctype="multipart/form-data">
   <input type="file" name="photo" />
   <br/>
   <input type="submit" value="Завантажити файл!" />
</form>