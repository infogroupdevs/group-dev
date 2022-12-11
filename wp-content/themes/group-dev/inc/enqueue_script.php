<?php
add_action('wp', 'scripts');
function scripts()
{
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '0.0.1', true);
	
	if(is_page('contact')) {
		wp_enqueue_script('libs', get_template_directory_uri() . '/js/libs.js', array('jquery'), '0.0.1', true);
		/*wp_enqueue_script('contact', get_template_directory_uri() . '/js/contact.js', array('jquery'), '0.0.1', true);
		wp_localize_script('contact', 'contact_custom', array(
			'rest_url' => rest_url(),
			'rest_nose' => wp_create_nonce('contact_form_custom_v1')
		));*/
	}
}
