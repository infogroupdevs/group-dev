<?php
    $options = get_fields('options');
?>
<span class="line line--left"></span>
<span class="line line--center"></span>
<span class="line line--right"></span>
<ul class="social-page zi-2 d-none lg:d-block">
  <li>
    <a href="" class="d-block">
      <i class="icon icon-facebook"></i>
    </a>
  </li>
  <li>
    <a href="" class="d-block">
      <i class="icon icon-twitter"></i>
    </a>
  </li>
  <li>
    <a href="" class="d-block">
      <i class="icon icon-linkedin"></i>
    </a>
  </li>
</ul>

<a href="mailto:<?php echo $options['business_emails'] ?? ''; ?>" class="telegram d-none lg:d-inline-block zi-2">
  <i class="icon icon-telegram-app"></i>
  <span class="email">
    <?php echo $options['business_emails'] ?? ''; ?>
  </span>
</a>

<article id="post-<?php the_ID(); ?>">
    <?php the_content(); ?>
</article>
