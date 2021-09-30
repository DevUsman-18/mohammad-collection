<?php
require_once 'functions.php';

if (isset($_GET['message']) && $_GET['message'] == 2) {
    echo 'Incorrect submission, try again';
}

$artist = '';
$paintingName = '';
$year = '' ;
$image = '';

if(isset($_POST['artist'])
    && isset($_POST['year-made'])
    && isset($_POST['painting-name'])
    && isset($_POST['image-link']))
{
    if ((strlen($_POST['artist'])
            || strlen($_POST['painting-name'])
            || strlen($_POST['image-link']) < 255)
        && (strlen($_POST['year-made']) === 4))
    {
        $database = getDB();
        $artist = $_POST['artist'];
        $year = $_POST['year-made'];
        $paintingName = $_POST['painting-name'];
        $image = $_POST['image-link'];
    } else {
        echo 'String is too long or year entered is incorrect';
    }
}

$userOutput = cleanseData($_POST);
if(!empty($userOutput)) {
    $artist = $userOutput[0];
    $paintingName = $userOutput[1];
    $year = $userOutput[2];
    $image = $userOutput[3];

sendFormData($database, $artist, $paintingName, $year, $image);
$submissionResults = getSubmission($database, $artist);

if($submissionResults == true){
        header("Location: index.php?message=1");
    } else {
        header("Location: form.php?message=2");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="normalize.css" type="text/css">
</head>
<body>
<h1>Submit your own art collection piece here</h1>
    <form method="post" action="form.php">
        <input type="text" name="artist" placeholder="Artist" required/>
        <br>
        <input type="number" name="year-made" placeholder="Year completed" required />
        <br>
        <input type="text" name="painting-name" placeholder="Name of painting" required />
        <br>
        <input type="text" name="image-link" placeholder="Image URL" required/>
        <br>
        <input type="submit" placeholder="submit" />
    </form>

<p><a href="index.php?message=1">Return to the front page</a></p>
</body>
</html>