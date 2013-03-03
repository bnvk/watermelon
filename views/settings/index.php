<form name="settings_update" id="settings_update" method="post" action="<?= base_url() ?>api/settings/modify" enctype="multipart/form-data">
<div class="content_wrap_inner">

	<div class="content_inner_top_right">
		<h3>App</h3>
		<p><?= form_dropdown('enabled', config_item('enable_disable'), $settings['watermelon']['enabled']) ?></p>
		<p><a href="<?= base_url() ?>api/<?= $this_module ?>/uninstall" id="app_uninstall" class="button_delete">Uninstall</a></p>
	</div>
	
	<h3>View Permissions</h3>

	<p>View
	<?= form_dropdown('view_permission', config_item('users_levels'), $settings['watermelon']['view_permission']) ?>
	</p>

	<p>View Group
	<?= form_dropdown('view_group_permission', config_item('users_levels'), $settings['watermelon']['view_group_permission']) ?>	
	</p>

	<p>View All Groups
	<?= form_dropdown('view_all_groups_permission', config_item('users_levels'), $settings['watermelon']['view_all_groups_permission']) ?>	
	</p>

</div>

<span class="item_separator"></span>

<div class="content_wrap_inner">

	<h3>Create & Manage Permissions</h3>

	<p>Create
	<?= form_dropdown('create_permission', config_item('users_levels'), $settings['watermelon']['create_permission']) ?>
	</p>

	<p>Publish
	<?= form_dropdown('publish_permission', config_item('users_levels'), $settings['watermelon']['publish_permission']) ?>	
	</p>

	<p>Manage All
	<?= form_dropdown('manage_permission', config_item('users_levels'), $settings['watermelon']['manage_permission']) ?>	
	</p>

</div>

<span class="item_separator"></span>

<div class="content_wrap_inner">
	
	<h3>Customization</h3>

	<p>URL Structure
	<?= form_dropdown('url_structure', config_item('watermelon_settings_url_structure'), $settings['watermelon']['url_structure']) ?>
	</p>

	<input type="hidden" name="module" value="<?= $this_module ?>">

	<p><input type="submit" name="save" value="Save" /></p>

</div>
</form>

<?= $shared_ajax ?>