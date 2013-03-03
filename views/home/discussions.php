<div id="content_wide_content">	
	<h2>Discussions <span id="text_light"><?= $idea->title ?></span></h2>
	<form name="idea_discussions" id="idea_discussions" method="post" enctype="multipart/form-data">



		<input type="submit" name="post" value="Save" />
	
	</form>

</div>
<div id="content_wide_toolbar">
	<?= $toolbar_steps ?>
</div>
<div class="clear"></div>

<script type="text/javascript">
$(document).ready(function()
{
	$("#idea_discussions").bind("submit", function(e)
	{
		e.preventDefault();
		var criteria_data = $('#idea_discussions').serializeArray();

		$.oauthAjax(
		{
			oauth 		: user_data,
			url			: base_url + 'api/content_meta/modify/id/' + $.url.segment(3),
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