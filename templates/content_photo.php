<a href="index.php">Назад</a>
<br/><br/>
<img width="25" src='icon/glaz.png'/>
<b>  переглянуто <?=views_image($photo)?> раз</b><br>
<img width="25" src='icon/like.png'/>
<b>  лайков <?=likes_image($photo)?> раз</b><br>
<img width="25" src='icon/dislike.png'/>
<b>  дизлайков <?=dislikes_image($photo)?> раз</b>
<br/>
<img width="900" src="<?=gallery_image($photo)?>" />

<? if(!$actionLike): ?>
    <form method='POST'>
    <input hidden name='like'> </input>
    <button type="sumbit" class="btn btn-outline-danger mx-5"><img src="like.png" width="50px" height="50px" name="like"></button>
    </form>
    <form method='POST'>
    <input hidden name='dislike'> </input>
    <button type="sumbit" class="btn btn-outline-danger mx-5"><img src="dislike.png" width="50px" height="50px" name="dislike"></button>
    </form>
<? endif ?>