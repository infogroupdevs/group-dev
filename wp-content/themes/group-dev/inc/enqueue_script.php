<?php
add_action('wp', 'scripts');
function scripts()
{
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '0.0.1', true);
}
