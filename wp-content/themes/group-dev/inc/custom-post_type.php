<?php


acf_add_options_page(array(
	'page_title' => 'General configuration',
	'menu_title' => 'General configuration',
	'menu_slug' => 'options-configuration',
	'icon_url' => 'dashicons-welcome-learn-more',
	'capability' => 'edit_posts',
	'redirect' => 'configuration-home'
));


acf_add_options_sub_page(array(
	'page_title' => 'Contact information',
	'menu_title' => 'Contact information',
	'menu_slug' => 'contact_information',
	'parent_slug' => 'options-configuration',
));


