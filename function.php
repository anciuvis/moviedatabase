<?php
function connect() {
	$user = 'root';
	$pass = '';
	$db = 'mysql:host=127.0.0.1;dbname=movies';
	$pdo = new PDO($db, $user, $pass);
	$pdo->exec('SET NAMES UTF8');
	return $pdo;
}

function getMovies() {
	$pdo = connect();
	$query = $pdo->prepare('SELECT * FROM movies ORDER BY id');
	$query->execute();
	$movies = $query->fetchAll(PDO::FETCH_ASSOC);
	return $movies;
}

function getById($id) {
		$query = $pdo->prepare("SELECT * FROM movies WHERE id = ?");
		$query->execute(array($id));
		$movie = $query->fetch(PDO::FETCH_ASSOC);
		return $movie;
}

?>
