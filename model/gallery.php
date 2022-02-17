<?php
function gallery_item($link, $id_foto)
{
    $result = mysqli_query($link, "SELECT * FROM statistics_img WHERE idPic = '$id_foto'");
    return mysqli_fetch_assoc($result); 
}   

function gallery_list($link)
{
    $result = mysqli_query($link, "SELECT * FROM statistics_img ORDER BY views DESC");
    return $result;
}

function gallery_icon($photo)
{
    return "img-m/" . $photo ;
    
}

function gallery_image($photo)
{
    return "img/" . $photo['idPic'];
}

function views_image($photo)
{
    return $photo['views'];
}

function likes_image($photo)
{
    return $photo['likes'];
}

function dislikes_image($photo)
{
    return $photo['dislikes'];
}

function increase_views($link, $photo){
    mysqli_query($link, "UPDATE statistics_img SET views = views+1 WHERE idPic = '$photo'");
}

function increase_like($link, $photo){
    if(mysqli_query($link, "UPDATE statistics_img SET likes = likes+1 WHERE idPic = '$photo[idPic]'"))
        header("Location: photo.php?id=$photo[idPic]&act=1");
}

function increase_dislike($link, $photo){
    if(mysqli_query($link, "UPDATE statistics_img SET dislikes = dislikes+1 WHERE idPic = '$photo[idPic]'"))
        header("Location: photo.php?id=$photo[idPic]&act=1");
}

function gallery_add($link, $file)
{
    $uploaddir = 'img/'; 
    $uploaddirm = 'img-m/';
    $filename=date('YmdHis').rand(100,1000).'.jpg';
    $uploadfile = $uploaddir . $filename;
    $uploadfilem = $uploaddirm . $filename;

    if(($file['type'] == 'image/gif' || $file['type'] == 'image/jpeg' ||
    $file['type'] == 'image/png') &&
    ($file['size'] != 0)){
        if(rename($file['tmp_name'], $uploadfile)){
            $percent = 200;
            list($width, $height) = getimagesize($uploadfile);
            $newheight = $height * $percent;
            $newwidth = $newheight / $width;
            $thumb = imagecreatetruecolor($percent, $newwidth);
            $source = imagecreatefromjpeg($uploadfile);
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $percent, $newwidth,$width, $height);
            imagejpeg($thumb,"$uploadfilem","100");  
            $sql = "INSERT INTO statistics_img (idPic) VALUES ('$filename')";
            if(mysqli_query($link, $sql)){
                header("Location:index.php"); 
            }          
        }
        else
            echo "Error, try again!";      
    }
    else
        echo "Wrong format!";
}
?>
