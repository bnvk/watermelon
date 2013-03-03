<?php
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();

		$this->load->config('watermelon');

		$this->data['page_title'] = 'Watermelon';
	}
	
	function idea()
	{	
		// Manage
		if (($this->uri->segment(3) == 'manage') && ($this->uri->segment(4)))
		{	
			// Need is valid & access and such
			$idea = $this->social_igniter->get_content($this->uri->segment(4));
			if (!$idea) redirect(base_url().'home/error');			
		
			$this->data['sub_title'] 		= 'Idea';
			$this->data['form_name']		= 'idea_editor';	
			$this->data['form_url']			= base_url().'api/content/modify/id/'.$idea->content_id;
			
			$this->data['content_id']		= $idea->content_id;
			$this->data['category_id']		= $idea->category_id;
			$this->data['title'] 			= $idea->title;
			$this->data['title_url'] 		= $idea->title_url;
			$this->data['description'] 		= $idea->content;
			$this->data['wysiwyg_value']	= $idea->content;
			$this->data['details'] 			= $idea->details;
			$this->data['comments_allow'] 	= $idea->comments_allow;
			$this->data['access'] 			= $idea->access;
			$this->data['status']			= $idea->status;
			$this->data['category_id']		= $idea->category_id;
			
			// Tags
			$this->load->library('tags/tags_library');			
			$this->data['tags']				= $this->tags_library->get_tags_content($idea->content_id);
		}
		else
		{
			$this->data['sub_title'] 		= 'Idea';
			$this->data['form_name']		= 'idea_editor';	
			$this->data['form_url']			= base_url().'api/content/create';
			
			$this->data['content_id']		= 0;
			$this->data['category_id']		= 0;
			$this->data['title'] 			= '';
			$this->data['title_url'] 		= '';
			$this->data['description'] 		= '';
			$this->data['wysiwyg_value']	= '';
			$this->data['details'] 			= 'idea';
			$this->data['comments_allow'] 	= 'Y';
			$this->data['access'] 			= 'E';
			$this->data['status']			= '';
			$this->data['category_id']		= '';

			// Tags
			$this->data['tags']				= NULL;
		}
		
		$this->data['wysiwyg_name']			= 'content';
		$this->data['wysiwyg_id']			= 'wysiwyg_content';
		$this->data['wysiwyg_class']		= 'wysiwyg_norm_full';
		$this->data['wysiwyg_width']		= 640;
		$this->data['wysiwyg_height']		= 200;
		$this->data['wysiwyg_resize']		= TRUE;
		$this->data['wysiwyg_media']		= FALSE;			
		$this->data['wysiwyg']	 			= $this->load->view($this->config->item('dashboard_theme').'/partials/wysiwyg', $this->data, true);		
		
		$this->data['categories'] 		= $this->social_tools->make_categories_dropdown(array('categories.module' => 'watermelon'), $this->session->userdata('user_id'), $this->session->userdata('user_level_id'), '+ Add Idea Group');	
		$this->data['toolbar_steps']	= $this->load->view('../modules/watermelon/views/partials/toolbar_steps', $this->data, true);
	
		$this->render('dashboard_wide');
	}
	
	function criteria()
	{
		// If No Idea
		$idea = $this->social_igniter->get_content($this->uri->segment(4));
		if (!$idea) redirect('home/watermelon/create', 'refresh');	
	
		$this->data['sub_title'] 		= 'Criteria';
		$this->data['idea']				= $idea;
		$this->data['idea_meta']		= $this->social_igniter->get_meta_content($idea->content_id);
		$this->data['criteria']			= config_item('watermelon_criteria');

		$this->data['toolbar_steps']	= $this->load->view('../modules/watermelon/views/partials/toolbar_steps', $this->data, true);	
		
		$this->render('dashboard_wide');
	}

	function features()
	{
		// If No Idea
		$idea = $this->social_igniter->get_content($this->uri->segment(4));
		if (!$idea) redirect('home/watermelon/create', 'refresh');

		$this->data['sub_title'] 		= 'Features';
		$this->data['idea']				= $idea;
		$this->data['idea_meta']		= $this->social_igniter->get_meta_content($idea->content_id);

		$this->data['toolbar_steps']	= $this->load->view('../modules/watermelon/views/partials/toolbar_steps', $this->data, true);	
		
		$this->render('dashboard_wide');
	}
	
	function budgets()
	{
		$idea = $this->social_igniter->get_content($this->uri->segment(4));
		if (!$idea) redirect('home/watermelon/create', 'refresh');

		$this->data['sub_title']		= 'Budgets';
		$this->data['idea']				= $idea;
		$this->data['budgets_meta']		= $this->social_igniter->get_meta_content($idea->content_id);

		$this->data['toolbar_steps']	= $this->load->view('../modules/watermelon/views/partials/toolbar_steps', $this->data, true);	
		
		$this->render('dashboard_wide');
	}

	function discussions()
	{
		// If No Idea
		$idea = $this->social_igniter->get_content($this->uri->segment(4));
		if (!$idea) redirect('home/watermelon/create', 'refresh');	
	
		$this->data['sub_title'] 		= 'Discussions';
		$this->data['idea']				= $idea;
		$this->data['idea_meta']		= $this->social_igniter->get_meta_content($idea->content_id);

		$this->data['toolbar_steps']	= $this->load->view('../modules/watermelon/views/partials/toolbar_steps', $this->data, true);	
		
		$this->render('dashboard_wide');
	}


}