<?php

$bh_tag = get_field("bh_tag");
$bh_title = get_field("bh_title");
$bh_copy = get_field("bh_copy");
$bh_cta = get_field("bh_cta");

?>

<section class="hero">
  <div class="wrapper">
    <div class="hero__heading">
      <div class="badge">
        <?= $bh_tag ?>
      </div>
      <div class="hero__title">
        <?= $bh_title ?>
      </div>
      <div class="hero__copy">
        <?= $bh_copy ?>
      </div>
      <a href="" class="button button--primary">
        <?= $bh_cta ?>
        <i></i>
      </a>
    </div>
    <figure class="hero__image mb-50 lg:mb-0">
      <img class="w-full" src="<?= UPLOAD_DIR ?>/drawdsgn.jpeg" alt="">
    </figure>
  </div>
</section>
