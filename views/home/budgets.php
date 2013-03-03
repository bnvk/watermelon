<div id="content_wide_content">	

	<h2 class="content_editor_title">Budgets <span id="text_light"><?= $idea->title ?></span></h2>
	<p class="content_editor_link"><span class="actions action_link"></span> <a href="<?= base_url() ?>watermelon/view/<?= $idea->content_id ?>">View Idea</a></p>

	<button name="create_budget_milestone" id="create_budget_milestone">Create Budget Milestone</button>
	<button name="attach_budget_milestone" id="attach_budget_milestone">Attach Budget Milestone</button>

	<form name="budgets" id="budgets" method="POST">

		<?php
		foreach(config_item('watermelon_budget_milestones') as $milestone_key => $milestone_val):
			$budget_spent = $this->social_igniter->find_meta_content_value($milestone_key.'-spent', $budgets_meta); 
			if (!$milestone_val) $budget_spent = 0;

			$budget_needed = $this->social_igniter->find_meta_content_value($milestone_key.'-needed', $budgets_meta); 
			if (!$milestone_val) $budget_needed = 0;
		?>
		<h3><?= $milestone_val ?></h3>

		<div class="budget_entry">
			<p>Spent</p>		
			<p>$ <input type="text" name="<?= $milestone_key ?>-spent" size="10" placeholder="0" value="<?= $budget_spent ?>"></p>
		</div>
	
		<div class="budget_entry">		
			<p>Needed</p>
			<p>$ <input type="text" name="<?= $milestone_key ?>-needed" size="10" placeholder="1000" value="<?= $budget_needed ?>"></p>
		</div>
		<div class="clear"></div>
		
		<?php endforeach; ?>
		
		<input type="submit" name="submit_budget" value="Save">
		
	</form>

</div>
<div id="content_wide_toolbar">
	<?= $toolbar_steps ?>
</div>
<div class="clear"></div>
<style type="text/css">
div.budget_entry {
	width: 250px; float: left;
	margin-bottom: 25px;
}
div.budget_entry p {
	margin-top: 5px !important;
	margin-bottom: 5px !important;
	padding-bottom: 0px !important;
}
</style>
<script src="http://scripts/jquery-jeditable/jquery.jeditable.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function()
{

	// Post Details
	$("#budgets").bind("submit", function(e)
	{
		e.preventDefault();
		var budget_data = $('#budgets').serializeArray();
		$.oauthAjax(
		{
			oauth 		: user_data,
			url			: base_url + 'api/content_meta/modify_multiple/id/' + $.url.segment(3),
			type		: 'POST',
			dataType	: 'json',
			data		: budget_data,
	  		success		: function(result)
	  		{
				$('html, body').animate({scrollTop:0});

				if (result.status == 'success')
				{
					$('#content_message').notify({status:result.status,message:result.message});
			 	}
			 	else
			 	{
					$('#content_message').notify({status:result.status,message:result.message});
			 	}
		 	}
		});
	});


	$('#create_budget_milestone').bind('click', function(e)
	{
		e.preventDefault();
		$.get(base_url + 'watermelon/dialogs/budget_milestone_editor',function(partial_html)
		{
			$('<div />').html(partial_html).dialog(
			{
				width	: 425,
				modal	: true,
				close	: function(){$(this).remove()},
				title	: 'Create Milestone	',
				create	: function()
				{
					$parent_dialog = $(this);
					// Do Custom Things
				},
				buttons	:
				{
					'Save':function()
					{
						var data = $('#form_name').serializeArray();
						data.push({'name':'module','value':'widgets'});
	
						 $.oauthAjax(
						 {
							url		: base_url + 'api/settings/create',
							type	: 'POST',
							dataType: 'json',
							data	: data,
						  	success	: function(result)
						  	{
								$('#content_message').notify({scroll:true,status:result.status,message:result.message});
								$parent_dialog.dialog('close');
						  	}
						});
					},
					'Cancel':function()
					{
						$parent_dialog.dialog('close');
					}
				}
	    	});
		});
	});


	$('#attach_budget_milestone').bind('click', function(e)
	{
		e.preventDefault();
		$.get(base_url + 'watermelon/dialogs/budget_milestones',function(partial_html)
		{
			$('<div />').html(partial_html).dialog(
			{
				width	: 425,
				modal	: true,
				close	: function(){$(this).remove()},
				title	: 'Create Milestone	',
				create	: function()
				{
					$parent_dialog = $(this);
					// Do Custom Things
				},
				buttons	:
				{
					'Save':function()
					{
						var data = $('#form_name').serializeArray();
						data.push({'name':'module','value':'widgets'});
	
						 $.oauthAjax(
						 {
							url		: base_url + 'api/settings/create',
							type	: 'POST',
							dataType: 'json',
							data	: data,
						  	success	: function(result)
						  	{
								$('#content_message').notify({scroll:true,status:result.status,message:result.message});
								$parent_dialog.dialog('close');
						  	}
						});
					},
					'Cancel':function()
					{
						$parent_dialog.dialog('close');
					}
				}
	    	});
		});
	});


});
</script>