<?php

class Client {
	
	private $_nameTable;
	
	public function __construct()
	{
		global $wpdb;
		$this->_nameTable = $wpdb->prefix . 'contact_form_custom';
	}
	
	public function save($data)
	{
		global $wpdb;
		$wpdb->insert(
			$this->_nameTable,
			$data
		);
	}
}
