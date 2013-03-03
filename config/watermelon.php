<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:		Social Igniter : Watermelon : Config
* Author: 	Brennan Novak
* 		  	brennan@citizensof.com
* 
* Created by Brennan Novak
*
* Project:	http://labs.citizensof.com
* Source: 	http://github.com/citizensof/watermelon
* 
* Description: this file Watermelon
*/

$config['watermelon_path']	= 'watermelon/';
$config['watermelon_criteria'] = array(
	'ease-to-implement'		=> 'Ease To Implement',
	'maintainability'		=> 'Maintainability',
	'open-sourceable'		=> 'Open Sourceable',
	'client-overlap'		=> 'Client Overlap',
	'ip-licensable'			=> 'IP Licensable',
	'existing-products'		=> 'Existing Products',
	'core-industry-relation'=> 'Core Industry Relation',
	'pazazz'				=> 'Pazazz',
	'modularity'			=> 'Modularity',
	'revenue-generation'	=> 'Revenue Generation'
);


$config['watermelon_idea_stages'] = array(
	'idea'			=> 'Idea',
	'discussion'	=> 'Dicussion',
	'planning'		=> 'Planning',
	'development'	=> 'Development',
	'completed'		=> 'Completed'
);

$config['watermelon_budget_milestones'] = array(
	'proof-of-concept'			=> 'Proof of Concept',
	'minimum-viable-product'	=> 'Minimum Viable Product',
	'public-beta'				=> 'Public Beta'
);

// Settings
$config['watermelon_settings_url_structure'] = array(
	'seo_friendly'		=> 'SEO Friendly (better for publically shared)',
	'id_based'			=> 'Better for large uses'
);