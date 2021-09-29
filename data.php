<?php

if($_POST['artist'] && $_POST['year-made'] && $paintingName && $_POST['painting-name'] && $_POST['image-link']
        !== null) {
    $artist = $_POST['artist'];
    $year = $_POST['year-made'];
    $paintingName = $_POST['painting-name'];
    $image = $_POST['image-link'];
}

echo $artist . $year . $paintingName . $image ;
?>