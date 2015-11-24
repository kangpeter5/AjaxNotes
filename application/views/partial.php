<?php if($notes) {?>
	<?php foreach($notes as $note){ ?>
	<div class="notes">
		<h4><?= $note['title']; ?></h4>
		<form class='deleteForm' action="/notes/delete" method="post">
			<input type="hidden" name="id" value="<?= $note['id']; ?>">
			<input type="submit" value="delete">
		</form>
		<form class="updateForm" action="/notes/update" method="post">
			<input type="hidden" name='id' value='<?= $note['id']; ?>'>
			<div class="description" name="description">
				<?= $note['description']; ?>
			</div>
			<!-- <input class="btn btn-success" type="submit" value="update"> -->
		</form>
	</div>
	<?php } ?>
<?php } ?>