<?php
function my_event_list_cb() {
	$nonce = sanitize_text_field( $_POST['nonce'] );
	
	if ( ! wp_verify_nonce( $nonce, 'contact_form_custom' ) ) {
		die ( 'Error!');
	}
	
	$email = sanitize_email($_POST['email']);
	
	$data = array(
		'names' => sanitize_text_field($_POST['names']),
		'last_name' => sanitize_text_field($_POST['last_name']),
		'email' => $email,
		'phone' => sanitize_text_field($_POST['phone']),
		'company' => sanitize_text_field($_POST['company']),
		'type_project' => sanitize_text_field($_POST['type_project']),
		'project_funded' => sanitize_text_field($_POST['project_funded']),
		'agree' => 1,
		'project_description' => sanitize_text_field( $_POST['project_description']),
		'create_at' => date('Y-m-d h:i:s'),
		'active' => 1,
	);
	
	try {
		$client = new Client();
		$client->save($data);
		echo json_encode(array('success' => true, 'message' => 'ok'));
		
		$headers = array('Content-Type: text/html; charset=UTF-8');
		ob_start();
		include plugin_dir_path(__FILE__) . '../email_template/template_clients.php';
		$content = ob_get_clean();
		wp_mail($email, 'Solicitud desarrollo de proyecto – GroupDev.', $content, $headers);
		
		ob_start();
		include plugin_dir_path(__FILE__) . '../email_template/template_admins.php';
		$content = ob_get_clean();
		
		$options = get_fields('options');
		wp_mail($options['business_emails'], 'Solicitud desarrollo de proyecto – GroupDev.', $content, $headers);
		
	} catch (Exception $e) {
		echo json_encode(array('error' => true, 'message' => 'Error'));
	}
	wp_die();
}
add_action( 'wp_ajax_nopriv_client', 'my_event_list_cb' );
add_action( 'wp_ajax_client', 'my_event_list_cb' );
