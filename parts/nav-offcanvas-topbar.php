<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar sticky" id="top-bar-menu"  data-sticky data-options="marginTop:0;stickTo:top;" style="width:100%" >
	<div class="top-bar-left float-left">
		<a href="<?php echo home_url(); ?>"><h3><?php bloginfo('name'); ?></h3></a>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>	
	</div>
</div>	

<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
//data-hide-for="<?php echo $breakpoint"
$breakpoint = "medium"; ?>

<div class="title-bar hide-for-medium" data-responsive-toggle="top-bar-menu" >
  <button class="menu-icon" type="button" data-toggle="offCanvas"></button>
</div>

