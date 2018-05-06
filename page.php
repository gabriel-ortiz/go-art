<?php 
/**
 * Template Name: Github Repo
 */

get_header(); ?>

<?php

	//get all the data for the page and art post type
	$thumb_url   = get_the_post_thumbnail_url( $post, 'full' );
	$title       = get_the_title();   // Could use 'the_title()' but this allows for override
	$description = ( $post->post_excerpt ) ? get_the_excerpt(): ''; // Could use 'the_excerpt()' but this allows for override
	$content	= get_the_content();

?>

<div class="off-canvas-wrapper">
	<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
	  <!-- Your menu or Off-canvas content goes here -->
		<div class="go-c-off-canvas">
			      	
			<div class="go-c-off-canvas__site-title">
			<a href="<?php echo home_url(); ?>"><h3><?php bloginfo('name'); ?></h3></a>
				</div>      	
			<div class="go-c-off-canvas__menu">
			   <?php joints_off_canvas_nav(); ?>       		
			</div>
			
			<div class="go-c-off-canvas__social-media">
			      <?php joints_social_media(); ?>
			</div>
		</div>

	</div>
	<div class="off-canvas-content" data-off-canvas-content>
		
		<header class="header" role="header" data-sticky-container>
			<?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>			
		</header>
		  <!-- Your page content lives here -->
		<div class="site-content grid-container">
			<div class="inner-content grid-x grid-padding-y grid-padding-x align-center">
	
				<main class="main cell" role="main" id="code">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
						<header class="grid-x">
							<div class="go-c-article-header cell" style="background-image:url(<?php echo esc_url( $thumb_url ); ?>)" role="banner">
								<h1 class="page-title"><?php echo $title; ?></h1>
								<div class="go-c-description"> <?php echo $description; ?></div>
							</div> <!-- end article header -->
						</header><!--end of grid-x-->
	
					    <section id="the-content" class="entry-content grid-x grid-margin-x small-up-1 medium-up-2 large-up-3" itemprop="articleBody" role="main">
						    <?php the_content(); ?>
						</section> <!-- end article section -->
											
						<footer class="article-footer">
							 <?php wp_link_pages(); ?>
						</footer> <!-- end article footer -->						
	
										
					</article> <!-- end article -->
			    
			    	<?php endwhile; endif; ?>	
				</main>
	
			</div> <!-- end #inner-content -->
	
		</div> <!-- end #content -->	
	  
	 
	 <?php get_footer(); ?>
	  
	</div>
</div>


