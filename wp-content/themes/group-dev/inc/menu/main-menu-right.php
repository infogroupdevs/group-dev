<div class="text-right pb-20">
  <button type="button" id="js-close-menu" class="position-absolute t-20 r-20 p-0 bg-transparent">
    <i class="icon-close fz-40"></i>
  </button>
  <figure class="text-right pr-50 pb-100">
    <?php the_custom_logo();?>
  </figure>
  <h3 class="h3 pb-80">
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