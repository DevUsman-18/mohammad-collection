<?php


$db = new PDO ('mysql:host=db; dbname=mohammad-collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare(" SELECT `artist`, `year-made`, `painting-name`,`image-link` FROM `collection-items`; ");

$query->execute();
$results = $query->fetchAll();


function displayDB(array $results) {
    $dbResult = ' ';
    foreach($results as $result){
       $dbResult .= '<div>'. '<img src="images/' . $result['image-link'] . '" alt="a painting of  '
           . $result['painting-name'] .' " /> <p>'
           . $result['artist'] . '<br>' . $result['painting-name'] . '<br>' . $result['year-made'] .  '</p></div>';
    }
    return $dbResult;
}

$displayResults = displayDB($results);