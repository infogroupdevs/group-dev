<?php
$title = get_field('title_general_categories');
$description = get_field('description_general_categories');
$categories = get_field('ours_categories');
//echo '<pre>';
//print_r($categories);
//echo '</pre>';
?>
<section class="bg-gray py-60">
    <div class="wrapper pb-20">
        <h2 class="text-center mb-20"><?php echo $title; ?></h2>
        <div class="text-center mb-20 wmax-770 mx-auto"><?php echo $description; ?></div>
    </div>
    <div class="d-flex flex-wrap">
			<?php foreach ($categories as $category): ?>
          <div class="col-12 md:col-3 p-0 transform-category-animation">
              <a href="<?php echo get_permalink($category['categories'][0]->ID); ?>">
                  <img src="<?php echo $category['image_category']['url'] ?>"
                       alt="<?php echo $category['categories'][0]->post_title ?>" width="100%" height="auto"/>
                  <div class="position-absolute b-0 l-0 r-0 ml-20 md:mx-auto wmax-180">
                      <div class="overflow-hidden">
                          <div class="description">
                              <h3 class="text-white mb-50"><?php echo $category['categories'][0]->post_title ?></h3>
                              <div class="text-white pb-60"><?php echo $category['description_category'] ?></div>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
			
			<?php endforeach; ?>
    </div>
</section>
