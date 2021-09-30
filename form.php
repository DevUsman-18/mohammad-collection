<?php
require 'functions.php';

$artist = '';
$paintingName = '';
$year = '' ;
$image = '';

if($_POST['artist'] && $_POST['year-made'] && $_POST['painting-name'] && $_POST['image-link']
    !== null) {
    if ((strlen($_POST['artist'])
            || strlen($_POST['painting-name'])
            || strlen($_POST['image-link']) < 255)
        && (strlen($_POST['year-made']) === 4))
    {
        $artist = $_POST['artist'];
        $year = $_POST['year-made'];
        $paintingName = $_POST['painting-name'];
        $image = $_POST['image-link'];
    } else {
        echo 'String is too long or year entered is incorrect';
        return $_POST = NULL;
    }
}

$userOutput = cleanseData($_POST);


//formData($artist, $year, $paintingName, $image);


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
        <input type="url" name="image-link" placeholder="Image" required/>
        <br>
        <input type="submit" placeholder="submit" />
    </form>

<p><a href="index.php?message=1">Return to the front page</a></p>
</body>
</html>