<?php
if (!defined('ABSPATH')) {
	exit;
}

require_once(plugin_dir_path(__FILE__) . 'list_table.class.php');

function list_table_layout()
{
	$ltc = new ListTableClass();
	echo '<div id="">';
	echo '<div class="col-wrap">';
	$ltc->prepare_items();
	$ltc->display();
	echo '</div>';
	echo '</div>';
}
list_table_layout();
