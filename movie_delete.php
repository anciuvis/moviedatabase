<?php
	include 'function.php';
	$pdo = connect();

	$query = $pdo->prepare("DELETE FROM movies WHERE id= :param");
	$query->execute(array(':param'=>$_GET['edit_id']));

	header('Location:index.php?okey=3');

?>
