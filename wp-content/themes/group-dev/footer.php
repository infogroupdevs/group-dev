<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Group_Dev
 */

 $options = get_fields('options');

?>

<footer class="footer bg-secondary py-50 lg:py-100">
	<div class="wrapper">
		<div class="lg:grid-50">
			<div class="">
				<h2 class="text-white mb-100">Let's collaborate</h2>
				<div class="text-white mb-30">LOGO</div>
				<p class="text-white">Powered by SocioLib.</p>
			</div>
			<div>
				<div class="text-white mb-30">
					<?php echo $options['business_info_top'] ?? ''; ?>
				</div>
				<h3 class="text-primary mb-50">Chat our expert</h3>
				<div>
					<div class="lg:grid-50">
						<div>
							<p class="text-white mb-10">CONTACTO</p>
							<?php if( have_rows('social_item', 'options') ): ?>
								<div class="social-item">
									<?php while( have_rows('social_item', 'options') ): the_row(); ?>
										<p class="text-white mb-5"><?php the_sub_field('title', 'option'); ?></p>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
						<div class="text-white mt-30">
							<?php echo $options['business_info_bottom'] ?? ''; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>
</body>
</html>
