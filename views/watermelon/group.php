<h1><?= $group->category ?></h1>
<p class="text_sub_heading"><?= $group->description ?></p>

<?php foreach ($ideas as $idea): ?>
<div class="group_idea_list">
	<div class="group_idea_list_text">
		<?php if (config_item('watermelon_url_structure') == 'seo_friendly'): ?>
		<h3><a href="<?= base_url().'watermelon/idea/'.$idea->title_url ?>"><?= $idea->title ?></a></h3>		
		<?php else: ?>
		<h3><a href="<?= base_url().'watermelon/idea/'.$idea->content_id ?>"><?= $idea->title ?></a></h3>		
		<?php endif; ?>
		<h4><?php if ($idea->comments_count) echo $idea->comments_count; else echo 'No'; ?> Comments</h4>
		<p><?= character_limiter(strip_tags($idea->content), 225) ?></p>		
	</div>
	<?= modules::run('ratings/widgets_vote_up_down', array('object' => 'content', 'object_id' => $idea->content_id, 'class' => 'group_idea_list_vote')); ?>
	<div class="clear"></div>
</div>
<?php endforeach; ?>