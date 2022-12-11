<?php
/**
 * Plugin Name: Formulario de contacto
 * Plugin URI:
 * Description: Formulario de contacto para la cotizacion de proyecto
 * Version: 1.0
 * Author: Group DEV
 * Author URI:
 */

if (!defined('ABSPATH')) {
	exit;
}


function contact_form_custom_activation()
{
	global $wpdb;
	$nameTable = $wpdb->prefix . 'contact_form_custom';
	
	$is_status_col = $wpdb->get_results(  "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS`  WHERE `table_name` = '{$nameTable}'"  );
	$charset_collate = $wpdb->get_charset_collate();
	
	if( empty($is_status_col) ) {
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $nameTable . '('
			. 'id bigint(20) unsigned NOT NULL AUTO_INCREMENT,'
			. 'names VARCHAR(256) NOT NULL,'
			. 'last_name VARCHAR(256) NOT NULL,'
			. 'email VARCHAR(256) NOT NULL,'
			. 'phone VARCHAR(15) NULL,'
			. 'company VARCHAR(256) NOT NULL,'
			. 'type_project VARCHAR(256) NOT NULL,'
			. 'project_funded VARCHAR(2) NOT NULL,'
			. 'agree BOOLEAN NOT NULL,'
			. 'project_description LONGTEXT NOT NULL,'
			. 'create_at DATETIME,'
			. 'active BOOLEAN NOT NULL DEFAULT true,'
			. 'PRIMARY KEY (ID)'
			. ')' . $charset_collate . ';';
		
		$wpdb->get_results($sql);
	}
}


register_activation_hook(__FILE__, 'contact_form_custom_activation');

add_action('init', 'setupAdminMembership');
function setupAdminMembership()
{
	if (is_plugin_active('contact-form-custom/contact-form-custom.php')) {
		add_thickbox();
		require_once (plugin_dir_path(__FILE__) . 'include/menu_admin.php');
		require_once (plugin_dir_path(__FILE__) . 'include/Client.class.php');
		require_once (plugin_dir_path(__FILE__) . 'include/api.php');
		require_once (plugin_dir_path(__FILE__) . 'include/requests.view.php');
	}
}


function load_scripts() {
	wp_enqueue_script( 'js_contact_form_custom', plugin_dir_url(__FILE__ ) . 'assets/js/contact.js', array( 'jquery' ) );
	
	wp_localize_script( 'js_contact_form_custom', 'ajax_var', array(
		'url'    => admin_url( 'admin-ajax.php' ),
		'nonce'  => wp_create_nonce( 'contact_form_custom' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );



