	<body>
		<section>
			<h1 style="margin-bottom:15px;" class="text-center">Movies database</h1>
			<div class="row mb-3">
				<a href="movie_input.php" class="btn btn-info btn-block col-lg-2 col-md-6 col-xs-12">Add movie</a>
				<p style="margin-bottom: 0; padding: 5px;" class="col-lg-2 col-md-6 col-xs-12 text-center">Sort by: </p>
				<a href="index.php?sortType=yearAsc" class="btn btn-outline-danger btn-block col-lg-1 col-md-2 col-xs-12">Year</a>
				<p></p>
				<a href="index.php?sortType=titleAsc" class="btn btn-outline-warning btn-block col-lg-1 col-md-2 col-xs-12">A-Z</a>
				<p></p>
				<a href="index.php?sortType=lengthAsc" class="btn btn-outline-success btn-block col-lg-2 col-md-3 col-xs-12">Duration</a>
				<p></p>
				<a href="index.php?sortType=ratingAsc" class="btn btn-outline-primary btn-block col-lg-2 col-md-2 col-xs-12">Rating</a>
				<p></p>
				<a href="index.php" class="btn btn-outline-secondary btn-block col-lg-2 col-md-3 col-xs-12">Clear all</a>
			</div>
			<div class="position-relative">
				<input type="text" id="searchMovie" placeholder="Search.." style="width: 100%;">
				<div class="position-absolute" id="searchList" style="z-index: 2; width: 100%; background-color: rgba(219, 224, 217, 0.95); padding: 0 15px;"></div>
			</div>
			<nav aria-label="page navigation">
				<ul class="pagination justify-content-center mb-0 mt-2">
					<? if( $_GET['page'] > 1 ): ?>
					<li class="page-item">
						<a class="page-link" href="index.php?page=1" aria-label="Previous">
							<span aria-hidden="true">&laquo;&laquo;</span>
							<span class="sr-only">First</span>
						</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="index.php?page=<?= $_GET['page']-1 ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>
					<? endif; ?>
					<?php for ($i = 1; $i <= $pageCount; $i++):  ?>
						<li class="page-item"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a>
						</li>
					<?php endfor; ?>
					<? if( $_GET['page'] < $pageCount ): ?>
					<li class="page-item">
						<a class="page-link" href="index.php?page=<?= $_GET['page']+1 ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="index.php?page=<?= $pageCount ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;&raquo;</span>
							<span class="sr-only">Last</span>
						</a>
					</li>
					<? endif; ?>
				</ul>
			</nav>
			<div class="row">
				<?php for ($i = $from; $i <=$till ; $i++): ?>
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<article class="card my-3 mx-0 p-3">
							<header class="title-header text-center" style="min-height: 94px;">
								<h4 style="min-height: 76px; padding-top: 10px;"><?= $movies[$i]['title'] ?></h4>
							</header>
							<div class="card-block text-center shadow">
								<div class="img-card" style="height:300px;">
									<a href="movie.php?edit_id=<?= $movies[$i]['id'] ?>"><img src="img/<?= $movies[$i]['image'] ?>" class="img-responsive" alt="picture" style="max-width: 100%; max-height: 100%; margin: 0 auto;"/></a>
								</div>
								<div class="row">
									<p class="card-text col-lg-7 col-md-7 col-xs-12 text-left">Year: <?= $movies[$i]['year'] ?></p>
									<p class="card-text col-lg-5 col-md-5 col-xs-12 text-right"><i class="fa fa-star"></i> <?= $movies[$i]['rating'] ?></p>
								</div>
								<p class="card-text text-left">Duration: <?= $movies[$i]['length'] ?></p>
								<p class="card-text text-left">Quality: <?= $movies[$i]['quality'] ?></p>
								<a href="movie.php?edit_id=<?= $movies[$i]['id'] ?>" class="btn btn-success btn-block">Watch</a>
								<a href="movie_input.php?edit_id=<?= $movies[$i]['id'] ?>" class="btn btn-warning btn-block">Edit movie</a>
								<a href="movie_delete.php?edit_id=<?= $movies[$i]['id'] ?>" class="btn btn-danger btn-block">Delete movie</a>
							</div>
						</article>
					</div>
				<?php endfor ?>
			</div>
			<nav aria-label="page navigation">
				<ul class="pagination justify-content-center">
					<? if( $_GET['page'] > 1 ): ?>
					<li class="page-item">
						<a class="page-link" href="index.php?page=1" aria-label="Previous">
							<span aria-hidden="true">&laquo;&laquo;</span>
							<span class="sr-only">First</span>
						</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="index.php?page=<?= $_GET['page']-1 ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>
					<? endif; ?>
					<?php for ($i = 1; $i <= $pageCount; $i++):  ?>
						<li class="page-item"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a>
						</li>
					<?php endfor; ?>
					<? if( $_GET['page'] < $pageCount ): ?>
					<li class="page-item">
						<a class="page-link" href="index.php?page=<?= $_GET['page']+1 ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="index.php?page=<?= $pageCount ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;&raquo;</span>
							<span class="sr-only">Last</span>
						</a>
					</li>
					<? endif; ?>
				</ul>
			</nav>
			<script type="text/javascript">
				$('#searchMovie').on('keyup', function(e){
					var search = $(this).val();
					$.ajax({
						url: 'search.php',
						data: {name: search},
						dataType: 'json',
						type: 'POST',
						success: function (data) {
							$( '#searchOutput' ).remove();
							let output = "<div id='searchOutput'>";
							for (let i = 0; i < data.length; i++) {
								output += "<div><a href='movie.php?edit_id="+data[i].id+"'>"+data[i].title+"</a></div>"
								console.log(data[i]);
							}
							output +="</div>";
							$( '#searchList' ).append(output);
						},
						error: function (data) {
							console.log('Error', data);
						}
					});
				})
			</script>
		</section>
	</body>
</html>
