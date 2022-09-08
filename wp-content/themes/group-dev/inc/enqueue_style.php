<?php
if (!is_admin()) {
	add_action('wp_enqueue_scripts', 'addStyle');
	function addStyle()
	{
		wp_register_style('main', get_bloginfo('template_directory') . '/css/main.css');
		wp_enqueue_style('main');
	}
}
