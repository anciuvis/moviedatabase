<?php
include 'view/header.view.php';
include 'function.php';

$pdo = connect();

if(isset($_GET['edit_id'])) {
	$editMovie = getById($_GET['edit_id']);
	
}

include 'view/movie-input.view.php';
?>
