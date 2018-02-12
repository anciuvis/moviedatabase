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
				<a href="index.php" class="btn btn-primary mt-auto ml-auto px-5 py-2">Back</a>
			</div>
		</div>
		<iframe class="mx-auto my-3" width="560" height="315" src="<?= $movie['video'] ?>" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="card my-3 mx-0 p-3">
		<div class="d-inline-flex">
			<h4 class="text-left p-2">Comments</h4><a href="#" id="btnNewComment" class="btn btn-info mt-auto ml-auto py-2 px-3">Add comment</a>
		</div>
		<div class="container" id="commentForm"></div>
		<div class="container mx-0 my-2">
			<?php for ($i = 0; $i <= $comments.length ; $i++): ?>
				<div class="card py-2 px-3">
					<h5><?= $comments[$i]['userName']?></h5>
					<h6><?=$comments[$i]['date']?> <?=$comments[$i]['eMail']?></h6>
					<p><?= $comments[$i]['content'] ?></p>
				</div>
			<?php endfor; ?>
		</div>
	</div>
	<script type="text/javascript">
		$('#btnNewComment').click(addForm);

		function addForm (){
			$( '#commentForm' ).empty();

			let formDiv = $( '<div>' );
			formDiv.attr('class', 'row');

			let columnFirst = $( '<div>' );
			columnFirst.attr('class', 'col-lg-6 col-md-6 col-sm-12');
			formDiv.append($( columnFirst));

			let movieId = $('<input>');
			movieId.val(<?= $_GET['edit_id']; ?>);
			movieId.attr('id','movieId');
			movieId.attr('type','hidden');
			columnFirst.append($( movieId ));

			let userNameLabel = $( '<label>' );
			userNameLabel.text('Your name:');
			userNameLabel.attr('for', 'userName');
			columnFirst.append($( userNameLabel ));

			let userNameInput = $('<input>');
			userNameInput.attr('id','userName');
			userNameInput.attr('class', 'form-control');
			columnFirst.append($( userNameInput ));

			let eMailLabel = $( '<label>' );
			eMailLabel.text('Your E-mail (optional):');
			eMailLabel.attr('for', 'eMail');
			columnFirst.append($( eMailLabel ));

			let eMailInput = $('<input>');
			eMailInput.attr('id','eMail');
			eMailInput.attr('class', 'form-control');
			columnFirst.append($( eMailInput ));

			let columnSecond = $( '<div>' );
			columnSecond.attr('class', 'col-lg-6 col-md-6 col-sm-12');
			formDiv.append($( columnSecond ));

			let commentLabel = $( '<label>' );
			commentLabel.text('Your comment:');
			commentLabel.attr('for', 'commentInput');
			columnSecond.append($( commentLabel ));

			let commentInput = $( '<textarea>' );
			commentInput.attr('class', 'form-control h-50 col-lg-12 col-md-12 col-sm-12');
			commentInput.attr('id','commentInput');
			columnSecond.append($( commentInput ));

			let sendBtn = $( '<button>' );
			sendBtn.text('Submit comment');
			sendBtn.attr('class','btn btn-success col-lg-6 col-md-6 col-sm-12');
			sendBtn.click(saveComment);
			columnSecond.append($( sendBtn ));

			let cancelBtn = $( '<button>' );
			cancelBtn.text('Cancel');
			cancelBtn.attr('class','btn btn-info col-lg-6 col-md-6 col-sm-12');
			cancelBtn.click(cancelClick);
			columnSecond.append($( cancelBtn ));

			$( '#commentForm' ).append($( formDiv ));
		};

		function cancelClick(){
			$( '#commentForm' ).empty();
		};

		function saveComment() {
			let entry = {
				userName: $( '#userName' ).val(),
				eMail: $( '#eMail' ).val(),
				movieId: $( '#movieId' ).val()
			};
			
		};
	</script>
</body>
