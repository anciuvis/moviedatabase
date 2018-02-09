<body>
	<div class="card my-3 mx-0 p-3">
		<div class="row my-2">
			<div class="card-block col-lg-4 col-md-6 col-xs-12 text-center shadow">
				<div class="img-card" style="height:300px;">
					<img src="img/<?= $movie['image'] ?>" class="img-responsive" alt="picture" style="max-width: 100%; max-height: 100%; margin: 0 auto;"/>
				</div>
			</div>
			<div class="col-lg-8 col-md-6 col-xs-12 d-inline-flex flex-column align-items-start">
				<h4 class="text-left p-2"><?= $movie['title'] ?></h4>
				<p class="p-2"><?= $movie['description'] ?></p>
				<a href="index.php" class="btn btn-primary mt-auto ml-auto p-2">Back</a>
			</div>
		</div>
		<iframe class="mx-auto my-3" width="560" height="315" src="<?= $movie['video'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</div>

</body>
