<?php
include 'view/header.view.php';

include 'function.php';

if(isset($_GET['okey'])) {
	if($_GET['okey']==1) { echo "<script>alert('Movie succesfully added!');</script>"; }
	if($_GET['okey']==0) { echo "<script>alert('Error!');</script>"; }
	if($_GET['okey']==2) { echo "<script>alert('Movie succesfully updated!');</script>"; }
	if($_GET['okey']==3) { echo "<script>alert('Movie deleted from database!');</script>"; }
}
$movies = getMovies();

include 'view/index.view.php';
?>
