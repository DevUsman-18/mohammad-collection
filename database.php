<?php
require_once 'functions.php';

$db = new PDO ('mysql:host=db; dbname=mohammad-collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare(" SELECT `artist`, `year-made`, `painting-name`,`image-link` FROM `collection-items`; ");

$query->execute();
$results = $query->fetchAll();

$displayResults = displayDB($results);
