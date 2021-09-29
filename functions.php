<?php

function displayDB(array $results) : string {
    $dbResult = ' ';
    if($results === []){
        return 'Incorrect input received.';
    }

    foreach($results as $result){
    $dbResult .= '<div>'. '<img src="images/'
                . $result['image-link']
                . '"' . ' alt="a painting of '
                . $result['painting-name']
                .' " /><p>'
                . $result['artist']
                . '<br>'
                . $result['painting-name']
                . '<br>'
                . $result['year-made']
                .  '</p></div>';
    }
    return $dbResult;
}

