<?php
function register_acf_block_types()
{
	
	if (function_exists('acf_register_block_type')) {

		// Register Block Hero.
		acf_register_block_type(
			[
				'name' => 'hero',
				'title' => __('Hero'),
				'description' => __('Block Hero.'),
				'category' => 'formatting',
				'icon' => 'images-alt2',
				'keywords' => ['block', 'custom', 'hero', 'quote'],
				'render_template' => '/blocks/hero.php',
				'mode' => 'edit', // Force Edit Mode
			]
		);
		
		acf_register_block_type(
			[
				'name' => 'spatialities',
				'title' => __('Spatialities'),
				'description' => __('Block Spatialities.'),
				'category' => 'formatting',
				'icon' => 'images-alt2',
				'keywords' => ['block', 'custom', 'spatialities', 'quote', 'especialidad', 'especialidades'],
				'render_template' => '/blocks/spatialities.php',
				'mode' => 'edit',
			]
		);
		
	}
}

add_action('acf/init', 'register_acf_block_types');
