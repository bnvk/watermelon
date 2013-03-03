<h3>Toolbar</h3>
<?php // ReAddd this stag marker navigation_create_stages(config_item('classes_create_stages'), $this->uri->segment(3), 'create') ?>
<div class="create_stage">
	<div class="stage_marker"><span class="item_icon type_idea"></span></div>
	<a href="<?= navigation_sidebar_link_basic('watermelon', $this->uri->segment(3), $this->uri->segment(4)) ?>">Idea</a>
</div>

<div class="create_stage">
	<div class="stage_marker"><span class="item_icon type_sliders"></span></div>
	<a href="<?= base_url() ?>home/watermelon/criteria/<?= $this->uri->segment(4); ?>">Criteria</a>
</div>

<div class="create_stage">
	<div class="stage_marker"><span class="item_icon type_feature"></span></div>
	<a href="<?= base_url() ?>home/watermelon/features/<?= $this->uri->segment(4); ?>">Features</a>
</div>

<div class="create_stage">
	<div class="stage_marker"><span class="item_icon type_payment"></span></div>
	<a href="<?= base_url() ?>home/watermelon/budgets/<?= $this->uri->segment(4); ?>">Budgets</a>	
</div>
<div class="clear"></div>