<?php
include 'view/header.view.php';
include 'function.php';

$movie = getById($_GET['edit_id']);
$comments = getComments($_GET['edit_id']);
include 'view/moviedetails.view.php';
?>
