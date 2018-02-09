<?php
	include 'function.php';

	$pdo = connect();
	// tikrinu ar nera klaidos - nera sukurta jau tokio ID numerio (jei kazkas piktybiskai pakeite rankiniu budu ID)
	$query = $pdo->prepare('SELECT count(id) as idCount FROM movies where id= ?');
	$query->execute([$_POST['id']]);
	$movieCount = $query->fetch(PDO::FETCH_ASSOC);
	if($movieCount['idCount']>0) {
		header('Location:index.php?okey=0');
		// echo "<script>window.location.replace('index.php?okey=0');</script>";
		return;
	}

	saveRecord ();

	header('Location:index.php?okey=1');

?>
