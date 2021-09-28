<?php

require_once 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Collection</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="normalize.css" type="text/css">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>

<nav>
    <div>
        <h3>Art Collection</h3>
    </div>
</nav>

<main>
    <section>
        <?php
        echo $displayResults;
        ?>
    </section>
</main>

<footer>
    <div>
       <p> To submit your own collection piece <a href="form.php" target="_blank" > click here </a> </p>
    </div>
</footer>

</body>
</html>