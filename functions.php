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
        } else {
            $outputArr[] .= filter_var($strings, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
    return $outputArr;
}


/**
 * Generates a new DB link and inserts form data into db
 *
 * @param object $db this is the db connection we have established
 * @param string $postArtist will take artists name from form
 * @param string $postYearMade will take year painting made from form
 * @param string $postPaintingName will take name of painting from form
 * @param string $postImageLink will take url of image from form
 */
function sendFormData(object $db, string $postArtist, string $postYearMade, string $postPaintingName, string $postImageLink)
{
    $query = $db->prepare("INSERT INTO `collection-items` (`artist`, `year-made`, `painting-name`, `image-link`) 
    VALUES (:artistName, :yearMade, :paintingName, :imageLink); ");

    $query->bindParam(':artistName', $postArtist);
    $query->bindParam(':yearMade', $postYearMade);
    $query->bindParam(':paintingName', $postPaintingName);
    $query->bindParam(':imageLink', $postImageLink);

    $query->execute();
}


/**
 * Using established db connection will query db to check if name of added painter is present in db,
 * if name present in db, will send user to index.php with success message
 * if name not present in db, will send user back to form page with error message
 *
 * @param object $db db connection
 * @param string $postArtist artist name to check against db
 */
function getSubmission(PDO $db, string $postArtist){
    $query = $db->prepare("SELECT `artist`, `year-made`, `painting-name`, `image-link` FROM `collection-items` 
WHERE `artist` = :artistName ;");

    $query->bindParam(':artistName', $postArtist);
    $query->execute();
    $results = $query->fetchAll();
    return $results;

}
