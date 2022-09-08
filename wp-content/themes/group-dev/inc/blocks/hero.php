<?php

$title = get_field("bh_title");

?>

<div>
  <?php if($title): ?>
    <h1><?php echo $title ?></h1>
  <?php endif; ?>
</div>