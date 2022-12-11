<?php

add_action('admin_menu', 'addMenu', 10);
function addMenu()
{
	add_menu_page(
		'Contactos',
		'Contactos',
		'manage_options',
		'manager-contacts',
		'manager_contacts'
	);
}

function manager_contacts()
{
	listRequests();
}
