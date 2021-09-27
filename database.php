<?php


$db = new PDO ('mysql:host=db; dbname=mohammad-collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare(" SELECT `artist`, `year-made`, `painting-name`,`image-link` FROM `collection-items`; ");

$query->execute();
$results = $query->fetchAll();

//echo '<pre>';
//var_dump($results);
//echo '</pre>';


foreach($results as $result){
    $dbResult = '<div>' . $result['artist'] . " " . $result['year-made'] . " " . $result['painting-name'] . " " . $result['image-link'] . '</div>';
}

echo $dbResult;