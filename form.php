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
    <form method="post" action="index.php?message=1">
        <input type="text" name="artist" placeholder="Artist" />
        <br>
        <input type="number" name="year-made" placeholder="Year completed" />
        <br>
        <input type="text" name="painting-name" placeholder="Name of painting" />
        <br>
        <input type="url" name="image-link" placeholder="Image" />
        <br>
        <input type="submit" placeholder="submit" />
    </form>
</body>
</html>