<div id="content_wide_content">
	<h2 class="content_editor_title">Idea <span id="text_light"><?= $title ?></span></h2>
	<p id="content_link" class="content_editor_link"><?php if ($content_id): ?><span class="actions action_link"></span> <a href="<?= base_url() ?>watermelon/view/<?= $content_id ?>">View Idea</a><?php endif; ?></p>

	<form method="post" id="idea_editor" name="idea_editor" action="<?= $form_url ?>">

		<p>
			<input type="text" name="title" id="title" class="input_full" value="<?= $title ?>" placeholder="Magic Carpet" />
			<span id="title_error"></span>
		</p>

		<div class="content_columns width_300">
		    <h3>Group</h3>
		    <p><?= form_dropdown('category_id', $categories, $category_id, 'id="category_id"') ?></p>
		</div>
		<div class="content_columns width_300">
		    <h3>Stage</h3>
		    <p><?= form_dropdown('details', config_item('watermelon_idea_stages'), $details, 'id="details"') ?></p>
		</div>

		<h3>Decription</h3>
		<p>
			<?= $wysiwyg ?>
		 	<span id="description_error"></span>
		</p>
			
	    <h3>Tags</h3>
	    <p><input name="tags" type="text" id="tags" size="75" value="" placeholder="design, interfaces, software, product, gardening, tools" /></p>
	    <p><?php if ($tags): foreach ($tags as $tag): ?>
	    <span><?= $tag->tag ?>, </span>
	    <?php endforeach; endif; ?></p>
	
	    <h3>Discussions</h3>
		<p><?= form_dropdown('comments_allow', config_item('comments_allow'), $comments_allow) ?></p>
	
		<h3>Access</h3>
		<p><?= form_dropdown('access', config_item('access_simple'), $access) ?></p>	
	
		<p><input type="submit" name="post" value="Continue" /></p>
		<div class="clear"></div>

	</form>
</div>
<div id="content_wide_toolbar">
	<?= $toolbar_steps ?>
</div>
<div class="clear"></div>

<script type="text/javascript">
$(document).ready(function()
{
	// Autocomplete Tags
	autocomplete("#tags", 'api/tags/all', 'tag');

	// Add Category
	$('#category_id').categoryManager(
	{
		action		: 'create',			
		module		: 'watermelon',
		type		: 'category',
		title		: 'Add Idea Group'
	});
	
	// Specify API URL
	$.data(document.body, 'api_url', $('#idea_editor').attr('action'));	

	// Update Status
	$('#idea_editor').bind('submit', function(e)
	{
		e.preventDefault();
		$.validator(
		{
			elements :
				[{
					'selector' 	: '#title',
					'rule'		: 'require',
					'field'		: 'Your idea needs a title',
					'action'	: 'label'	
				},{
					'selector' 	: '#description',
					'rule'		: 'require',
					'field'		: 'Your idea needs a description',
					'action'	: 'label'	
				}],
			message	 : '',
			success	 : function()
			{	
				var idea_data	= $('#idea_editor').serializeArray();
				idea_data.push({'name':'module','value':'watermelon'},{'name':'type','value':'idea'},{'name':'source','value':'web'});
				
				$.oauthAjax(
				{
					oauth 		: user_data,
					url			: $.data(document.body, 'api_url'),
					type		: 'POST',
					dataType	: 'json',
					data		: idea_data,
				  	success		: function(result)
				  	{
						$('html, body').animate({scrollTop:0});
						$('#content_message').notify({scroll:true,status:result.status,message:result.message});						

						if (result.status == 'success')
						{
							// Update Links
							$('#content_link').html('<span class="actions action_link"></span> <a href="' + base_url + 'watermelon/view/' + result.data.content_id + '">View Idea</a>');
	
							$.updateContentManager( 
							{
								page_url		: base_url + 'home/watermelon/manage/' + result.data.content_id,
								api_url			: base_url + 'api/content/modify/id/' + result.data.content_id,
								link_elements	: 'div.create_stage a', 
								link_url		: result.data.content_id
						  	});
					  	}
				 	}
				});
			}
		});
	});

});
</script>
