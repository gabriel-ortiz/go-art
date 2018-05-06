<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>

<div class="title-bar" data-responsive-toggle="top-bar-menu" data-hide-for="<?php echo $breakpoint ?>">
  <button class="menu-icon" type="button" data-toggle="offCanvas"></button>
  <div class="title-bar-title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></div>
</div>
