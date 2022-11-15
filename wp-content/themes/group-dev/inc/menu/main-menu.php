<?php 

$items = wp_get_nav_menu_items('Main Menu'); ?>
<nav class="flex-1">
  <ul class="d-none lg:d-flex justify-content-center align-items-center h-full -r-full">
    <?php if($items){
      foreach($items as $item){ ?>
        <li class="px-20">
          <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
        </li>
      <?php } ?>
    <?php } ?>
  </ul>
</nav>