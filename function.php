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
	if (isset($_GET['sortType'])) {
		if($_GET['sortType']=='yearAsc') { $que = 'SELECT * FROM movies ORDER BY year asc'; }
		if($_GET['sortType']=='yearDesc') { $que = 'SELECT * FROM movies ORDER BY year desc'; }
		if($_GET['sortType']=='titleAsc') { $que = 'SELECT * FROM movies ORDER BY title asc'; }
		if($_GET['sortType']=='titleDesc') { $que = 'SELECT * FROM movies ORDER BY title desc'; }
		if($_GET['sortType']=='lengthAsc') { $que = 'SELECT * FROM movies ORDER BY length asc'; }
		if($_GET['sortType']=='lengthDesc') { $que = 'SELECT * FROM movies ORDER BY length desc'; }
		if($_GET['sortType']=='ratingAsc') { $que = 'SELECT * FROM movies ORDER BY rating asc'; }
		if($_GET['sortType']=='ratingDesc') { $que = 'SELECT * FROM movies ORDER BY rating desc'; }

	} else {
		$que = 'SELECT * FROM movies ORDER BY id';
	}
	$query = $pdo->prepare($que);
	$query->execute();
	$movies = $query->fetchAll(PDO::FETCH_ASSOC);
	return $movies;
}

function getById($id) {
	$pdo = connect();
	$query = $pdo->prepare("SELECT * FROM movies WHERE id = ?");
	$query->execute([$id]);
	$movie = $query->fetch(PDO::FETCH_ASSOC);
	return $movie;
}

function postComment() {
	$pdo = connect();
	$sql = 'INSERT INTO comments (movieId, userName, eMail, content) VALUES ("'.$_POST['movieId'].'", "'.$_POST['userName'].'", "'.$_POST['eMail'].'", "'.$_POST['content'].'")';
	$query = $pdo->prepare($sql);
	$query->execute();
	$id = $pdo->lastInsertId();
	commentInsert($id);
	// return $id;
	// return getComments($_POST['movieId']);
}

function commentInsert($id) {

}

function getComments($id) {
	$pdo = connect();
	$query = $pdo->prepare("SELECT * FROM comments WHERE movieId = ?");
	$query->execute([$id]);
	$comments = $query->fetchAll(PDO::FETCH_ASSOC);
	return $comments;
}

function deleteId() {
	$pdo = connect();
	$query = $pdo->prepare("DELETE FROM movies WHERE id= :param");
	$query->execute([':param'=>$_GET['edit_id']]);
}

function saveRecord() {
	$pdo = connect();
	if(isset($_GET['edit_id'])) {
		$sql = "UPDATE movies SET title= :title, quality= :quality, length= :length, year= :year, description= :description, image= :image, rating= :rating WHERE id = :param";
		$query = $pdo->prepare($sql);
		$query->execute([':param'=>$_POST['id'], ':title'=>$_POST['title'], ':quality'=>$_POST['quality'], ':length'=>$_POST['length'], ':year'=>$_POST['year'], ':description'=>$_POST['description'], ':image'=>$_POST['image'], ':rating'=>$_POST['rating'] ]);

	} else {
		$sql = 'INSERT INTO movies (title, quality, length, year, description, image, rating) VALUES (:title, :quality, :length, :year, :description, :image, :rating)';
		$query = $pdo->prepare($sql);
		$query->execute([':title'=>$_POST['title'], ':quality'=>$_POST['quality'], ':length'=>$_POST['length'], ':year'=>$_POST['year'], ':description'=>$_POST['description'], ':image'=>$_POST['image'], ':rating'=>$_POST['rating']]);
	}
}

function searchMovie($search) {
	$pdo = connect();
	$sql = "SELECT title, id FROM movies WHERE title LIKE '%{$search}%' ";
	$query = $pdo->prepare($sql);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}
?>
