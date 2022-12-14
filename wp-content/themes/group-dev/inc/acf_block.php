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
				'name' => 'specialties',
				'title' => __('Spatialities'),
				'description' => __('Block Spatialities.'),
				'category' => 'formatting',
				'icon' => 'images-alt2',
				'keywords' => ['block', 'custom', 'specialties', 'quote', 'especialidad', 'especialidades'],
				'render_template' => '/blocks/specialties.php',
				'mode' => 'edit',
			]
		);
		
		acf_register_block_type(
			[
				'name' => 'categories',
				'title' => __('Categories'),
				'description' => __('Block Categories.'),
				'category' => 'formatting',
				'icon' => 'images-alt2',
				'keywords' => ['block', 'custom', 'experiences', 'categories'],
				'render_template' => '/blocks/categories.php',
				'mode' => 'edit',
			]
		);
		
	}
}

add_action('acf/init', 'register_acf_block_types');
