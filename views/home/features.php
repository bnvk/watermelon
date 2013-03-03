<div id="content_wide_content">	
	<h2 class="content_editor_title">Features <span id="text_light"><?= $idea->title ?></span></h2>
	<p class="content_editor_link"><span class="actions action_link"></span> <a href="<?= base_url() ?>watermelon/view/<?= $idea->content_id ?>">View Idea</a></p>

	<ul id="idea_features">
		<?php if ($idea_meta): $i=0; foreach ($idea_meta as $meta): if ($meta->meta == 'feature'): $i++; ?>
		<li class="editable_item editable" id="feature_<?= $meta->content_meta_id ?>" data-content_meta_id="<?= $meta->content_meta_id ?>">
			<?= $meta->value ?>
		</li>
		<?php endif; endforeach; endif; ?>
	</ul>
		
	<p class="editable_item"><input type="button" id="add_feature" value="Add Feature"></p>

</div>
<div id="content_wide_toolbar">
	<?= $toolbar_steps ?>
</div>
<div class="clear"></div>

<script src="<?= base_url() ?>js/jquery.jeditable.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function()
{

	// Add feature
	$('#add_feature').live('click', function(e)
	{
		e.preventDefault();
		var count		= $('li.idea_feature').size() + 1;
		var separator	= '';
		var html		= '<li class="editable_item" id="add_feature_item"><form name="idea_feature" id="idea_feature" method="post" enctype="multipart/form-data"><textarea name="value" id="idea_feature" class="repeating_body textarea_full" rows="3" placeholder="Ability to magically fly across the sky"></textarea><input class="hide" type="button" id="save_feature" value="Save Feature"> &nbsp; <input class="hide" type="button" id="cancel_feature" value="Cancel"></form></li>';
	
		$('#add_feature').hide(100);
		$('#idea_features').append(html).children(':last').hide().fadeIn('normal');
		$('#save_feature, #cancel_feature').fadeIn();		
	});	
	
	// Delete feature
	$('.delete_feature').live('click', function(e)
	{
		e.preventDefault();
		$(this).parent().parent().parent('li.idea_feature').fadeOut(500, function() { $(this).remove(); });
	});

	
	$('#cancel_feature').live('click', function(e)
	{
		$('#add_feature_item').remove();
		$('#save_feature, #cancel_feature').fadeOut();
		$('#add_feature').fadeIn();
	});


	// Edit Features
	function doEditable()
	{
		$(".editable").editable(function(value, settings)
		{ 
	     	console.log(settings);		
			var content_meta_id = $(this).data('content_meta_id');
			var feature_data	= $('form.editable').serializeArray();
		
			$.oauthAjax(
			{
				oauth 		: user_data,
				url			: base_url + 'api/content_meta/modify/id/' + content_meta_id,
				type		: 'POST',
				dataType	: 'json',
				data		: feature_data,
		  		success		: function(result) {}
		  	});
	     	return(value);
	     },{ 
			type   		: 'textarea',
			submit 		: 'Save Feature',
			cancel 		: 'Cancel',
			cssclass 	: 'editable',
			width		: 625,
			height		: 40,
			tooltip		: 'Click to edit...',
			onblur		: 'ignore'
		});
	}

	doEditable();

	$('#save_feature').live('click', function(e)
	{
		e.preventDefault();
		var feature_data = $('#idea_feature').serializeArray();
		feature_data.push({'name':'meta','value':'feature'});

		console.log(feature_data);

		$.oauthAjax(
		{
			oauth 		: user_data,
			url			: base_url + 'api/content_meta/create/id/' + $.url.segment(3),
			type		: 'POST',
			dataType	: 'json',
			data		: feature_data,
	  		success		: function(result)
	  		{	  		
				if (result.status == 'success')
				{
					$('#add_feature_item').remove();
					$('#save_feature, #cancel_feature').remove();
					$('#add_feature').fadeIn();					

					$('#idea_features').append('<li class="editable_item editable" id="feature_' + result.content_meta.content_meta_id + '" data-content_meta_id="' + result.content_meta.content_meta_id + '">' + result.content_meta.value + '</li>');
					doEditable();
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