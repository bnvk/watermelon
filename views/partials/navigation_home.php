<h2 class="content_title"><img src="<?= $modules_assets ?>watermelon_32.png"> Watermelon</h2>
<ul class="content_navigation">
	<?= navigation_list_btn('home/watermelon', 'Activity') ?>
	<?= navigation_list_btn('home/watermelon/create', 'Create') ?>
	<?php if ($logged_user_level_id <= 2)
	echo navigation_list_btn_manage('home/watermelon/', array('manage', 'criteria', 'features', 'budgets'), 'Manage', $this->uri->segment(3));
	?>
</ul>