<?php
class Dialogs extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->config('watermelon');
	}

	function budget_milestone_editor() 
	{
		// Is Milestone "Group"
	
	
		// Is Existing "Global" bundle of milestones
		
		
	
		$this->load->view('dialogs/budget_milestone_editor', $this->data);		
	}
	
	function budget_milestones()
	{
		
		$this->load->view('dialogs/budget_milestones', $this->data);		
	}
	

}