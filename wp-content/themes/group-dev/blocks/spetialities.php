<?php
$title = get_field('title_specialities');
$description = get_field('description_specialities');
$page = get_field('page_specialities');
$image_1 = get_field('image_specialities_1');
$image_2 = get_field('image_specialities_2');
$image_2 = get_field('image_specialities_2');
$specialities = get_field('specialities');
?>

<section class="bg-gray py-120">
    <div class="md:grid-1 wrapper">
        <div class="position-relative align-self-start mb-108 lg:mb-0">
            <img src="<?= $image_1['sizes']['specialty-image-1'] ?>"
                 width="<?= $image_1['sizes']['specialty-image-1-width'] ?>"
                 height="<?= $image_1['sizes']['specialty-image-1-height'] ?>" alt="<?= $title ?>"
                 class="w-full h-auto sm:w-420 sm:h-420 mx-auto d-block wmax-100pto"/>
            <img src="<?= $image_2['sizes']['specialty-image-2'] ?>"
                 width="<?= $image_2['sizes']['specialty-image-2-width'] ?>"
                 height="<?= $image_2['sizes']['specialty-image-2-height'] ?>" alt="<?= $title ?>"
                 class="position-absolute zi-1 r-0 b--80 w-80pto h-auto sm:w-357 sm:h-238"
            />
        </div>
        <div class="md:pl-72">
            <h6>SERVICIOS</h6>
            <h2 class="my-25"><?= $title ?></h2>
            <div class="d-block"><?= $description ?></div>
            <div class="md:grid-2 my-25">
                <?php
                    $index = 1;
                    $length = count($specialities);
                ?>
                <?php foreach ($specialities as $value): ?>
                    <?php if ($index == 1): ?>
                        <ul class="check">
                    <?php endif; ?>
                        <li class="py-5"><?= $value['specialty'] ?></li>
	
	                <?php if ($index == 6): ?>
                        </ul>
                        <?php $index = 0; ?>
	                <?php endif; ?>
                 
	                <?php $index++ ?>
                
                <?php endforeach; ?>
                
                <?php if ($index <= $index - 1): ?>
                    </ul>
                <?php endif; ?>
                
            </div>
			<?php if ($page): ?>
              <a href="<?= $page ?>" class="btn btn-primary mb-25">Ver Más</a>
			<?php endif; ?>
        </div>
    </div>
</section>
