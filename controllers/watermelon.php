<?php
class Watermelon extends Site_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->config('watermelon');
	}

	function index()
	{
		if (!$this->social_auth->logged_in()) redirect();
		if ($this->session->userdata('user_level_id') > config_item('watermelon_view_all_groups_permission')):
			$this->session->set_flashdata('message', 'Oops, you do not have access to view all idea groups');
			redirect();	
		endif;
	
		$this->data['groups'] 		= $this->social_tools->get_categories_view('module', 'watermelon');
		$this->data['page_title']	= 'Groups';

		$this->render();
	}

	function view()
	{
		if (config_item('watermelon_url_structure') == 'seo_friendly'):
			if ($idea = $this->social_igniter->get_content($this->uri->segment($this->uri->total_segments()))):
				redirect('/watermelon/idea/'.$idea->title_url);
			endif;
		else:
			if ($this->uri->segment(3)) redirect(base_url().'watermelon/idea/'.$this->uri->segment(3));
		endif;
	}

	function group()
	{
		if (!$this->social_auth->logged_in()) redirect();
		if ($this->session->userdata('user_level_id') > config_item('watermelon_view_group_permission')):
			$this->session->set_flashdata('message', 'Oops, you do not have access to view that idea group');
			redirect();
		endif;	
	
		$group	 				= $this->social_tools->get_category_title_url('category', $this->uri->segment(3));
		$this->data['group']	= $group;
		$this->data['ideas']	= $this->social_igniter->get_content_view('category_id', $group->category_id, 'all', 1000);

		$this->data['page_title']	= 'Group ';
		
		$this->render();
	}

	function idea()
	{
		if (!$this->social_auth->logged_in()) redirect();
		if ($this->session->userdata('user_level_id') > config_item('watermelon_view_permission')):
			$this->session->set_flashdata('message', 'Oops, you do not have access to view that idea');
			redirect();
		endif;

		// Manage
		$this->load->library('tags/tags_library');

		// Need is valid & access and such
		if (config_item('watermelon_url_structure') == 'seo_friendly'):
			$idea = $this->social_igniter->get_content_title_url('idea', $this->uri->segment($this->uri->total_segments()));
		else:
			$idea = $this->social_igniter->get_content($this->uri->segment($this->uri->total_segments()));	
		endif;

		//if (!$idea) redirect(base_url().'error');

		$this->data['idea']			= $idea;
		$this->data['idea_meta']	= $this->social_igniter->get_meta_content($idea->content_id); 
		$this->data['categories'] 	= $this->social_tools->get_categories_view('module', 'watermelon');
		$this->data['criteria']		= config_item('watermelon_criteria');
		$this->data['tags']			= $this->tags_library->get_tags_content($idea->content_id);

		// For Widgets
		$this->data['content_id']		= $idea->content_id;
		$this->data['widget_id']		= 'watermelon';
		$this->data['widget_region']	= 'manual';
		$this->data['widget_title']		= 'Write Comment';
			$this->data['widget_content'] 	= 'Hullo der!';

		// Load Comments Widgets
		if ($idea->comments_allow != 'N')
		{
			$this->data['widget_title']		= '';
			$this->data['comments_list']	= modules::run('comments/widgets_comments_list', $this->data);
			$this->data['comments_write']	= modules::run('comments/widgets_comments_write', $this->data);
		}

		$this->data['page_title']	= $idea->title;
		

		$this->render('wide');
	}
	
}
