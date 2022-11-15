<div class="text-right pb-20">
  <button type="button" id="js-close-menu" class="position-absolute t-20 r-20 p-0 bg-transparent">
    <i class="icon-close fz-40"></i>
  </button>
  <figure class="d-block lg:d-none position-absolute top-20 text-left pr-0 pb-50 lg:pb-100">
    <?php the_custom_logo();?>
  </figure>
  <div class="d-flex flex-column lg:d-none pb-50 pt-100">
    <?php if($items){
      foreach($items as $item){ ?>
        <li class="py-10">
          <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
        </li>
      <?php } ?>
    <?php } ?>
  </div>
  <h3 class="h3 pb-80 lg:pb-80 lg:pt-150">
    <i class="icon-chat fz-20"></i>
    Chat our expert
  </h3>

  <?php if( have_rows('social_item', 'options') ): ?>
    <ul class="pb-30">
      <?php while( have_rows('social_item', 'options') ): the_row(); 
      $icon = get_sub_field('icon');
      $title = get_sub_field('title');
      ?>
        <li class="mb-5">
          <span>
            <?= $icon ?>
          </span>
            <?= $title ?>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>

  <?= the_field('info', 'option'); ?>
</div>