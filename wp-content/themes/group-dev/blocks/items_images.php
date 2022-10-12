<?php
$title = get_field('title_items_images');
$description = get_field('description_items_images');
$image = get_field('image_items_images');
$items = get_field('items_ii');
?>
<section class="bg-gray py-60">
	<div class="md:grid-1 wrapper">
		<div class="md:pl-72">
			<h2 class="my-25 text-center"><?php echo $title ?></h2>
			<div class="d-block text-center wmax-770 mx-auto mb-20"><?php echo $description ?></div>
			<div class="md:grid-2 my-25">
				<?php $index = 1; ?>
                <ul>
                <?php foreach ($items as $value): ?>
                <li class="wmax-394 mb-30 position-relative pl-72">
                  <div class="position-absolute fz-42 fw-bold mt-22 l-0 text-gray-400"><?php echo $index ?>.</div>
                  <div class="d-block text-primary fw-bold fz-20"><?php echo $value['items_ii_title'] ?></div>
                  <div class="d-block"><?php echo $value['items_ii_description'] ?></div>
                </li>
	                <?php $index++; ?>
                <?php endforeach; ?>
                </ul>
                <img src="<?php echo $image ?>"
                     width="100%"
                     height="auto" alt="<?php echo $title ?>"
                />
                
			</div>
		</div>
	</div>
</section>
