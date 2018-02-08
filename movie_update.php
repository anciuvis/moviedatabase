<?php
	include 'function.php';
	
	$pdo = connect();

	$sql = "UPDATE movies
				SET title='".$_POST['title']."', quality='".$_POST['quality']."', length='".$_POST['length']."', year='".$_POST['year']."', description='".$_POST['description']."', image='".$_POST['image']."', rating='".$_POST['rating']."'
				WHERE id = ?";
	$query = $pdo->prepare($sql);
	$query->execute(array($_POST['id']));

	header('Location:index.php?okey=2');
?>
