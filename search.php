<?php

include 'function.php';

$search = $_POST['name'];
// echo $search;
$results = searchMovie($search);

echo JSON_encode($results);

?>
