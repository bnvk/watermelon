<?php
$this->load->helper('color');
$color_rgb_bright	= hex_to_rgb(config_item('design_link_color_normal'), 'csv');
$color_rgb_dark		= hex_to_rgb(config_item('design_link_color_hover'), 'csv');
?>
<style type="text/css">
#watermelon_title              { background: url('/application/modules/watermelon/assets/watermelon_64.png') 365px -6px no-repeat }
p.text_featured_words          { font-family: ; font-size: 21px; font-weight: bold; font-style: italic; color: #999; }
p.text_sub_heading             { margin-top: 0px; font-size: 18px; font-weight: bold; }


/* Watermelon - URL /watermelon */
div.group_list                 { }


/* Groups - URL /watermelon/groups/group-name */
div.group_idea_list            { width: 850px; border: 2px solid #d3d3d3; border-radius: 25px; margin: 25px 25px 25px 0; padding: 15px 25px; }
div.group_idea_list_text       { width: 600px; float: left; }
div.group_idea_list_text h3    { margin: 15px 0 }
div.group_idea_list_vote       { float: right; width: 140px; height: 85px; margin-top: 15px; }


/* Idea - URL /watermelon/idea/1234 */
#idea                          { width: 775px; margin-bottom: 50px; float: left; }
#idea_left                     { width: 400px; float: left; margin-right: 75px; margin-bottom: 50px; }
#idea_right                    { width: 425px; float: left; margin-bottom: 50px; }


/* Vote */
#idea_vote                     { width: 140px; height: 75px; float: right; }
div.ratings_vote_container     { width: 50px; height: 85px; margin: 0 10px; float: left; text-align: center; }
div.ratings_vote_container div { line-height: 18px; font-size: 18px; font-weight: bold; color: #d0d0d0; }
a.ratings_vote                 { width: 50px; height: 50px; display: block; text-align: center; background-image: url('/application/views/site_simple/assets/icons/vote_up_down.png'); background-repeat: no-repeat; }
a.ratings_vote span            { display: none }
.vote_up                       { background-position: 0 0; position: relative; top: 0px; left: 0px; }
.vote_down                     { background-position: 0 -50px; position: relative; top: 12px; left: 0px; }
.vote_voted 			{ background-color: #<?= config_item('design_link_color_normal') ?>; }
.vote_unvoted      		{ background-color: #d3d3d3 }
div.vote_count_yes 		{ display: block; position: relative; top: 15px; left: 0px; }
div.vote_count_no  		{ display: block; position: relative; top: 15px; left: 0px; }


/* Criteria */
#criteria                { width: 400px; height: auto; margin-bottom: 100px; }
div.criteria_item        { margin: 0px 0px 50px 0 }
div.criteria_item_icon   { width: 75px; height: 75px; float: left; }
div.criteria_item_info   { width: 225px; height: 75px; margin-left: 50px; float: left; font-size: 16px; font-weight: bold; }
div.criteria_precent_bar { margin-top: 10px; padding: 6px 12px; color: #EEE; font-weight: bold; font-size: 12px; min-width: 18px; border-radius: 6px; text-align: right; border: 2px double #333; background-color: #434343; background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(67, 67, 67)), to(rgb(0, 0, 0))); background-image: -webkit-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: -moz-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: -o-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: -ms-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#434343', EndColorStr='#000000'); }
div.criteria_precent_zero
                         { margin-top: 8px; padding: 0px; font-weight: bold; font-size: 14px; }
/* Features */
#features                { width: 425px; margin-bottom: 100px; }
div.feature              { width: 425px; padding: 15px; margin: 15px 0; background: #f3f3f3; border-radius: 8px; font-size: 18px; }

/* Tags */
#tags                    { width: 425px }
#tags h2                 { margin-bottom: 35px }
a.tag                    { min-width: 30px; float: left; border-top-left-radius: 22px; border-bottom-left-radius: 22px; border-top-right-radius: 8px; border-bottom-right-radius: 8px; font-size: 16px; color: #FFFFFF; padding: 10px 12px 10px 12px; margin: 20px 20px 0 0; border: 2px double #333; background-color: #434343; background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(67, 67, 67)), to(rgb(0, 0, 0))); background-image: -webkit-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: -moz-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: -o-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: -ms-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#434343', EndColorStr='#000000'); }

a.tag:hover {
	border: 2px double #<?= config_item('design_link_color_hover') ?>;
	background: #<?= config_item('design_link_color_normal') ?>;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(<?= $color_rgb_bright ?>)), to(rgb(<?= $color_rgb_dark ?>)));
	background-image: -webkit-linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	background-image: -moz-linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	background-image: -o-linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	background-image: -ms-linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	background-image: linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#<?= config_item('design_link_color_normal') ?>', EndColorStr='#<?= config_item('design_link_color_hover') ?>');
	text-decoration: none;
}
a.tag img { margin-right: 10px; }

/* Discussions */
#discussions      		{ width: 425px; margin: 0 0 50px 0; }

/* Budgets */
#idea_budgets      		{ width: 800px; margin-left: 35px; margin-bottom: 50px; }
#idea_budgets h3   		{ margin-bottom: 20px }
span.budget_needed 		{ float: right; font-size: 18px; font-weight: bold; }
div.budget_outer   		{ width: 800px; border-radius: 40px; padding: 8px 0px; margin-bottom: 60px; border: 2px solid #000; background-color: #434343; background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(67, 67, 67)), to(rgb(0, 0, 0))); background-image: -webkit-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: -moz-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: -o-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: -ms-linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); background-image: linear-gradient(top, rgb(67, 67, 67), rgb(0, 0, 0)); filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#434343', EndColorStr='#000000'); }


div.budget_spent {
	border-radius: 20px;
	padding: 5px;
	margin: 0px 10px;
	border: 2px solid #<?= config_item('design_link_color_hover') ?>;
	background: #<?= config_item('design_link_color_normal') ?>;
	background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(<?= $color_rgb_bright ?>)), to(rgb(<?= $color_rgb_dark ?>)));
	background-image: -webkit-linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	background-image: -moz-linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	background-image: -o-linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	background-image: -ms-linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	background-image: linear-gradient(top, rgb(<?= $color_rgb_bright ?>), rgb(<?= $color_rgb_dark ?>));
	filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#<?= config_item('design_link_color_normal') ?>', EndColorStr='#<?= config_item('design_link_color_hover') ?>');
	text-decoration: none;
}

div.budget_nospent_text { font-weight: bold; color: #ffffff; text-align: left; border-radius: 20px; padding: 5px 5px 5px 18px; font-size: 14px; font-weight: bold; line-height: 14px; text-shadow: -1px -1px -1px #555; }
div.budget_spent_text   { font-weight: bold; color: #ffffff; text-align: right; padding-right: 10px; font-size: 14px; font-weight: bold; line-height: 14px; text-shadow: -1px -1px -1px #555; }


</style>