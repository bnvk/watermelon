<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:		Social Igniter : Module Template : Routes
* Author: 	Brennan Novak
* 		  	contact@social-igniter.com
*
* Project:	http://social-igniter.com/
* Source: 	http://github.com/socialigniter/module-template
*
* Standard installed routes for Module Template. 
*/
$route['watermelon'] 							= 'watermelon';
$route['watermelon/group/(:any)'] 				= 'watermelon/group';
$route['watermelon/settings'] 					= 'settings/index';
$route['watermelon/idea/(:any)'] 				= 'watermelon/idea/$1';
$route['watermelon/home/create'] 				= 'home/idea';
$route['watermelon/home/manage/(:num)']	 		= 'home/idea';