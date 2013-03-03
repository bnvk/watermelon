<h1 id="watermelon_title">Watermelon</h1>
<p class="featured_text">Welcome to Watermelon, the place you plant your ideas so they can grow into big tasty watermelons!	</p>

<?php foreach ($groups as $group): ?>
<div class="group_list">
	<h3><?= $group->category ?></h3>
	<p><strong><?= $group->contents_count ?> Ideas</strong> &nbsp;&nbsp; <a href="<?= base_url().'watermelon/group/'.$group->category_url ?>">View Group</a></p>
</div>
<?php endforeach; ?>