<?php
if (!defined('ABSPATH')) {
	exit;
}


require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');

class ListTableClass extends WP_List_Table
{
	
	var $name_table = 'contact_form_custom';
	
	public function console_log($data)
	{
		echo '<script>';
		echo 'console.log(' . json_encode($data) . ')';
		echo '</script>';
	}
	
	public function prepare_items()
	{
		$orderby = isset($_GET['orderby']) ? trim($_GET['orderby']) : '';
		$order = isset($_GET['order']) ? trim($_GET['order']) : '';
		
		$search_term = isset($_POST['s']) ? trim($_POST['s']) : '';
		
		$data = $this->wp_list_table_data($orderby, $order, $search_term);
		
		$per_page = 10;
		$current_page = $this->get_pagenum();
		$total_items = count($data);
		$this->set_pagination_args(array(
			'total_items' => $total_items,
			'per_page' => $per_page
		));
		
		$this->items = array_slice($data, (($current_page - 1) * $per_page), $per_page);
		
		$columns = $this->get_columns();
		$hidden = $this->get_hidden_colums();
		$sortable = $this->get_sortable_columns();
		
		$this->_column_headers = array($columns, $hidden, $sortable);
	}
	
	public function wp_list_table_data($orderby = '', $order = 'asc', $search_term = '')
	{
		global $wpdb;
		if (!empty($search_term)) {
			$all_post = $wpdb->get_results(
				"SELECT * FROM " . $wpdb->prefix . $this->name_table .
				" WHERE (name
                LIKE '%$search_term%' AND active = 1)", ARRAY_A
			);
		} else {
			$all_post = $wpdb->get_results(
				"SELECT * FROM " . $wpdb->prefix . $this->name_table . " WHERE active = 1 ORDER BY id $order", ARRAY_A
			);
		}
		return $all_post;
	}
	
	public function get_hidden_colums()
	{
	}
	
	public function get_sortable_columns()
	{
		return array (
			'names' => [ 'names', true],
			'create_at' => [ 'create_at', true],
		);
	}
	
	public function get_bulk_actions()
	{
		$action = array(
			'delete' => 'Delete'
		);
		
		return false; //$action;
	}
	
	public function get_columns()
	{
		$columns = array(
			//'cb' => '<input type="checkboc" />',
			'id' => 'ID',
			'names' => 'Nombres',
			'last_name' => 'Apellidos',
			'company' => 'Empresa',
			'email' => 'Email',
			'phone' => 'Teléfono',
			'project_funded' => 'Presupuesto',
			'type_project' => 'Tipo de proyecto',
			'project_description' => 'Descripción',
			'create_at' => 'Fecha solicitud',
		);
		
		return $columns;
	}
	
	public function column_cb($item)
	{
		/*if($item['id'] != 1) {
			return sprintf('<input type="checkbox" name="post[]" value="%s" />', $item['name']);
		}*/
		return false;
	}
	
	public function column_default($item, $column_name)
	{
		switch ($column_name) {
			case 'id':
			case 'names':
			case 'last_name':
			case 'company':
			case 'email':
			case 'phone':
			case 'project_funded':
			case 'type_project':
			case 'create_at':
				return $item[$column_name];
			case 'project_description':
				$html = "<div id='description' style='display:none;'><p>{$item[$column_name]}</p></div>";
				$html .= '<a href="#TB_inline?&width=300&height=300&inlineId=description" class="thickbox">Ver descripción</a>';
				return $html;
			default:
				return 'no value';
		}
	}
	
	public function column_title($item)
	{
	}
	
}
