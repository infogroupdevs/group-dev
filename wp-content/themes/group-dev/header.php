<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Group_Dev
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header p-20 bg-semi-transparent">
    <div class="d-flex justify-content-between">
        <div class="">
            <?php the_custom_logo();?>
        </div>
        <?php require_once(PATH_INC . '/menu/main-menu.php'); ?>
        <button type="button" id="js-open-menu" class="w-20 p-0 bg-transparent">
            <img class="w-full" src="<?php echo UPLOAD_DIR ?>/icon-menu.png" alt="">
        </button>
    </div>
    <section id="js-menu-right" class="menu-right position-fixed t-0 w-400 h-screen pt-100 pr-20 pb-20 pl-50 bg-gray-500 overflow-auto-y">
			<?php require_once(PATH_INC . '/menu/main-menu-right.php'); ?>
    </section>
</header>
