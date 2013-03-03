<div id="content_wide_content">	
	<h2 class="content_editor_title">Criteria <span id="text_light"><?= $idea->title ?></span></h2>
	<p class="content_editor_link"><span class="actions action_link"></span> <a href="<?= base_url() ?>watermelon/view/<?= $idea->content_id ?>">View Idea</a></p>
	<form name="idea_criteria" id="idea_criteria" method="post" enctype="multipart/form-data">
		<?php 
		foreach($criteria as $crit_key => $crit_name): 
			$crit_value = $this->social_igniter->find_meta_content_value($crit_key, $idea_meta); 
			if (!$crit_value) $crit_value = 0;	
		?>
		<h3><?= $crit_name ?></h3>
		<p><input id="slider_<?= $crit_key ?>" class="criteria_slider" type="slider" name="<?= $crit_key ?>" value="<?= $crit_value ?>" /></p>
		<p>&nbsp;</p>
		<?php endforeach; ?>
		<input type="submit" name="post" value="Continue" />
	</form>
</div>
<div id="content_wide_toolbar">
	<?= $toolbar_steps ?>
</div>
<div class="clear"></div>

<link type="text/css" href="<?= $modules_assets ?>jquery.slider.css" rel="stylesheet" media="screen" />
<script type="text/javascript" src="<?= $modules_assets ?>jquery.slider.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{	
	// Criteria Slider
	$(".criteria_slider").slider(
	{ 
		from: 0, 
		to: 100
	});

	// Post Details
	$("#idea_criteria").bind("submit", function(e)
	{
		e.preventDefault();
		var criteria_data = $('#idea_criteria').serializeArray();

		$.oauthAjax(
		{
			oauth 		: user_data,
			url			: base_url + 'api/content_meta/modify_multiple/id/' + $.url.segment(3),
			type		: 'POST',
			dataType	: 'json',
			data		: criteria_data,
	  		success		: function(result)
	  		{
				$('html, body').animate({scrollTop:0});

				if (result.status == 'success')
				{
					$('#content_message').notify({status:result.status,message:result.message,complete:'redirect',redirect: base_url + 'home/watermelon/features/' + $.url.segment(3)});
			 	}
			 	else
			 	{
					$('#content_message').notify({status:result.status,message:result.message});
			 	}
		 	}
		});
	});
});
</script>