<?php
function listRequests()
{
	echo '<div class="wrap">';
	echo '<h1 class="wp-heading-inline">Administrador de solicitudes</h1>';
	echo '<hr class="wp-header-end">';

	
	ob_start();
	include_once plugin_dir_path(__FILE__) . 'table.html.php';
	$template = ob_get_contents();
	ob_end_clean();
	
	echo $template;
	echo '</div>';
}
