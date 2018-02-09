<body>
	<section>
		<?php
			if(isset($_GET['edit_id'])) { ?>
				<h1>Edit movie form</h1>
				<form action="movie_update.php?edit_id=<?= $_GET['edit_id'] ?>" method="POST" class="row">
		<?php
			} else { ?>
				<h1>New movie form</h1>
				<form action="movie_create.php" method="POST" class="row">
		<?php } ?>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<?php
					if(isset($_GET['edit_id'])): ?>
						<label for="id" class="col-lg-12 col-md-12 col-sm-12" style="display: none;">ID nr.</label>
						<input type="number" class="col-lg-12 col-md-12 col-sm-12" style="display: none;" name="id" min='0' step='1' value="<?= $editMovie ['id']; ?>">
				<?php endif; ?>
				<label for="title" class="col-lg-12 col-md-12 col-sm-12">Title</label>
				<input type="text" class="col-lg-12 col-md-12 col-sm-12" name="title" value="<?= $editMovie['title']; ?>">
				<label for="quality" class="col-lg-12 col-md-12 col-sm-12">Quality</label>
				<input type="text" class="col-lg-12 col-md-12 col-sm-12" name="quality" value="<?= $editMovie['quality']; ?>">
				<label for="length" class="col-lg-12 col-md-12 col-sm-12">Length</label>
				<input type="time" class="col-lg-12 col-md-12 col-sm-12" name="length" step="2"value="<?= $editMovie['length']; ?>">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<label for="description" class="col-lg-12 col-md-12 col-sm-12">Description</label>
				<input type="text" class="col-lg-12 col-md-12 col-sm-12" name="description" value="<?= $editMovie['description']; ?>">
				<label for="year" class="col-lg-12 col-md-12 col-sm-12">Select Year</label>
				<input type="number" class="col-lg-12 col-md-12 col-sm-12" name="year" min='1920' step='1' value="<?= $editMovie['year']; ?>">
				<label for="image" class="col-lg-12 col-md-12 col-sm-12">Image</label>
				<input type="text" class="col-lg-12 col-md-12 col-sm-12" name="image" value="<?= $editMovie['image']; ?>">
				<label for="rating" class="col-lg-12 col-md-12 col-sm-12">Rating</label>
				<input type="number" class="col-lg-12 col-md-12 col-sm-12" name="rating" min='0' step='0.1' value="<?= $editMovie['rating']; ?>">
			</div>
			<div style="width: 100%; text-align: center; padding:10px;">
				<input type="submit" value="Send" class="btn btn-success btn-block">
				<a href="index.php" class="btn btn-primary btn-block">Back</a>
			</div>
		</form>
	</section>
</body>
</html>
