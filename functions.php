<?php

/**
 * Set up DB connection
 *
 * @return PDO returns set up values as an object to be passed into query function below
 */
function getDB() : object {
    $db = new PDO ('mysql:host=db; dbname=mohammad-collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * Query DB for all fieldnames and return the results
 *
 * @param object $db this is db setup connetion results as an object to be run
 *
 * @return mixed returns results of querying db as an array
 */
function getPaintings(object $db) : array{
    $query = $db->prepare(" SELECT `artist`, `year-made`, `painting-name`,`image-link` FROM `collection-items`; ");
    $query->execute();
    $results = $query->fetchAll();
    return $results;
}

/**
 * Takes the result of querying DB as an array and returns them in concatenated string if DB array is not empty
 *
 * @param array $results The results from the DB generated earlier using getPaintings()
 *
 * @return string Returns a concatenated string that can be interpreted in HTML within a div tag.
 */
function displayDB(array $results) : string {
    $dbResult = ' ';
    if(!count($results)){
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


/**
 * Cleanse user input using filter_var() and return an array
 *
 * @param array $userInput user input in form is passed through
 *
 * @return array filtered user input collected in array and returned
 */
function cleanseData(array $userInput) : array {
    $outputArr = [];
    foreach($userInput as $strings){
        if(!is_string($strings)){
            return ['Incorrect input'];
        }
    }

    foreach($userInput as $input){
        $outputArr[] .= filter_var($input, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    return $outputArr;
}


/**
 * @param string $postArtist
 * @param string $postYearMade
 * @param string $postPaintingName
 * @param string $postImageLink
 */
function formData(string $postArtist, string $postYearMade, string $postPaintingName, string $postImageLink){

}



