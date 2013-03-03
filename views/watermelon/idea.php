<div id="idea">
	<h1><?= $idea->title ?></h1>
	<p class="text_sub_heading">Idea <?= display_category_link($categories, $idea->category_id, base_url().'watermelon/group/', 'for') ?> by <a href=""><?= $idea->name ?></a></p>
	<p><?= $idea->content ?></p>
</div>
<?= modules::run('ratings/widgets_vote_up_down', array('object' => 'content', 'object_id' => $idea->content_id, 'class' => 'group_idea_list_vote')); ?>
<script type="text/javascript">
	$.getScript(base_url + "ratings/vote_up_down", function() { renderVotesMultiple('.group_idea_list_vote'); });
</script>


<div id="idea_left">
	<?php if ($idea_meta): ?>
	<div id="criteria">
		<h2>Criteria</h2>
		<?php foreach ($criteria as $crit_key => $crit_value): $crit_stregnth = $this->social_igniter->find_meta_content_value($crit_key, $idea_meta); if ($crit_stregnth > 0): ?>
		<div class="criteria_item">
			<div class="criteria_item_icon">
				<img src="<?= $this_module_assets.'icons/'.$crit_key ?>.png">
			</div>
			<div class="criteria_item_info">
				<?= $crit_value ?><br>
				<div class="criteria_precent_bar" style="width: <?= $crit_stregnth * 2.5 ?>px;"><?= $crit_stregnth; ?>%</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php endif; endforeach; ?>
	</div>
	<?php endif; ?>
	
	<?php if ($tags): ?>
	<div id="tags">
		<h2>Tags</h2>
	    <?php foreach ($tags as $tag): ?>
	    <a href="<?= base_url().'tags/'.$tag->tag_url ?>" class="tag"><img src="<?= $this_module_assets ?>images/tags_circle.png"><?= $tag->tag ?></a>
	    <?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>

<div id="idea_right">
	<?php if ($this->social_igniter->find_meta_content_value('feature', $idea_meta)): ?>
	<div id="features">
		<h2>Features</h2>
		<?php foreach($idea_meta as $meta): if ($meta->meta == 'feature'): ?>
		<div class="feature"><?= $meta->value; ?></div>
		<?php endif; endforeach; ?>
	</div>
	<?php endif; ?>
	
	<?php if ($idea->comments_allow == 'Y'): ?>
	<div id="discussions">
		<h2>Discussion</h2>
	    <?= $comments_list ?>
	    <?= $comments_write ?>
	</div>
	<?php endif; ?>
</div>
<div class="clear"></div>

<div id="idea_budgets">
	<h2>Budgets</h2>
	<?php
	$total_spent	= 0;
	$total_needed	= 0;

	foreach(config_item('watermelon_budget_milestones') as $milestone_key => $milestone_val):
		$budget_spent	= $this->social_igniter->find_meta_content_value($milestone_key.'-spent', $idea_meta); 	
		$budget_needed	= $this->social_igniter->find_meta_content_value($milestone_key.'-needed', $idea_meta); 

		// If Exists
		if ($budget_needed):

			$budget_percent = $budget_spent / $budget_needed;
			$budget_bar		= $budget_percent * 800;
			
			if ($budget_bar > 750)
			{
				$budget_bar		= $budget_bar - 35;
			}
			
			$total_spent	= $budget_spent + $total_spent;
			$total_needed	= $budget_needed + $total_needed;	
	?>
	<h3><?= $milestone_val ?> <span class="budget_needed">$<?= $budget_needed ?></span></h3>
	<div class="budget_outer">
		<?php if ($budget_spent): ?>
		<div class="budget_spent" style="width: <?= $budget_bar ?>px; ">
			<div class="budget_spent_text">$<?= $budget_spent ?></div>
		</div>
		<?php else: ?>
			<div class="budget_nospent_text">$<?= $budget_spent ?></div>	
		<?php endif; ?>
	</div>
	<?php endif; endforeach; ?>
	<?php if ($total_needed): ?>
	<h3>Total Budget <span class="budget_needed">$<?= $total_spent.' of $'.$total_needed ?></span></h3>
	<?php else: ?>
	<script type="text/javascript">$(document).ready(function(){ $('#idea_budgets').hide(); });</script>
	<?php endif; ?>
</div>

<div class="clear"></div>