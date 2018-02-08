	<body>
		<section>
			<h1 style="margin-bottom:15px;" class="text-center">Movies database</h1><a href="movie_input.php" class="btn btn-primary btn-block">Add movie</a>
			<div class="row">
				<?php foreach($movies as $movie): ?>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<article class="card" style="padding: 15px; margin: 10px 0;">
							<header class="title-header text-center" style="min-height: 94px;">
								<h4 style="min-height: 76px; padding-top: 10px;"><?= $movie['title'] ?></h4>
							</header>
							<div class="card-block text-center shadow">
								<div class="img-card" style="height:300px; margin-bottom: 10px;">
									<a href="#"><img src="<?= $movie['image'] ?>" class="img-responsive" alt="picture" style="max-width: 100%; max-height: 100%; margin: 0 auto;"/></a>
								</div>
								<div class="row">
									<p class="card-text col-lg-4 col-md-4 col-xs-12 text-left">Year: <?= $movie['year'] ?></p>
									<p class="card-text col-lg-8 col-md-8 col-xs-12 text-right">Quality: <?= $movie['quality'] ?></p>
								</div>
								<div class="row">
								<p class="card-text col-lg-8 col-md-8 col-xs-12 text-center">Duration: <?= $movie['length'] ?></p>
								<p class="card-text col-lg-4 col-md-4 col-xs-12 text-center"><i class="fa fa-star"></i> <?= $movie['rating'] ?></p>
								</div>
								<a href="movie.php?edit_id=<?= $movie['id'] ?>" class="btn btn-success btn-block">Watch</a>
								<a href="movie_input.php?edit_id=<?= $movie['id'] ?>" class="btn btn-warning btn-block">Edit movie</a>
								<a href="movie_delete.php?edit_id=<?= $movie['id'] ?>" class="btn btn-danger btn-block">Delete movie</a>
							</div>
						</article>
					</div>
				<?php endforeach ?>
			</div>
		</section>
	</body>
</html>
