<?php 
/**
 * Template Name: Artwork Archive
 */

get_header(); ?>

<?php

//get the satsang data
get_template_part( 'parts/get', 'artwork-category' );


$satsang_data = get_artwork_data();

wp_reset_postdata();

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
	  <!-- Your page content lives here -->
	<header id="go-c-header" class="header go-c-header" role="header" sticky-container>
		<?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>			
	</header>	  
	<div class="site-content">
		
		<div class="inner-content grid-x grid-padding-y grid-padding-x">
	
		    <div class="medium-4 cell js-go-scroll hide-for-small-only"role="compliementary">
		    	
		    	<div  data-sticky-container> 
		    	
					<div class="grid-x grid-margin-x grid-margin-y small-up-3 medium-up-3 sticky go-c-artwork"  data-sticky data-anchor="satsang" data-margin-top="5" >
	
						<div class="go-c-artwork__desc cell show-for-large">
							<a href="#" class="go-c-artwork--top">Top <i class="fas fa-arrow-circle-up"></i></a>
							<p>Scroll through artwork in this series</p>
						</div>
	
						
						<?php if ($satsang_data->have_posts()) : while ($satsang_data->have_posts()) : $satsang_data->the_post(); ?>
						
						<?php 
							$preview_url	= get_the_post_thumbnail_url( $post, 'thumbnail' ); 
							$art_id			= 'artwork_preview' . $post->ID;
						?>
						<a href="<?php echo '#artwork-'.$post->ID; ?>"  class="cell go-c-artwork__preview-grid artwork_preview <?php echo $art_id ?>" style="background-image:url(<?php echo esc_url( $preview_url ); ?>)">
						</a>
					    
					    <?php endwhile; endif; ?>							
				    										
						
					</div>	
					
		    	</div>

				
			</div> <!-- end #main -->
			
			<main class="main large-8 medium-8 cell" role="main" id="satsang">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
					
					<div class="grid-x">
						<header class="go-c-artwork__article-header cell" style="background-image:url(<?php echo esc_url( $thumb_url ); ?>)" role="banner">
							<h1 class="page-title"><?php echo $title; ?></h1>
							<div class="go-c-artwork__page-description"> <?php echo $description; ?>
							<?php if( !empty( $content ) ): ?>
								<p><a href="#the-content"class="js-go-link-to-full float-right scrollLink">Read full description</a></p>
							<?php endif; ?>
							</div>
							
						</header> <!-- end article header -->
					</div><!--end of grid-x-->
					
					<?php if ($satsang_data->have_posts()) : while ($satsang_data->have_posts()) : $satsang_data->the_post(); ?>
					
					<?php 
						$artwork_url	= get_the_post_thumbnail_url( $post, 'full' ); 
						$art_id			= 'artwork_' . $post->ID;
						$art_title		= $post->post_title;
						$art_desc		= $post->post_content;
						$art_year 		= get_post_meta( $post->ID, 'artwork_year', true );
						$art_medium		= get_post_meta( $post->ID, 'artwork_medium', true );
					?>
					<section class="js-go-artwork__scrollspy grid-x align-center" id="<?php echo 'artwork-'.$post->ID; ?>">	
						<div class="cell medium-6 go-c-artwork__image">
							<img src="<?php echo esc_url( $artwork_url); ?>"></img>
						</div>
						<div class="cell medium-4 go-c-artwork__content">
							<h3><?php echo $art_title; ?></h3>
							<p><?php echo $art_year;?></p>
							<p><?php echo $art_medium; ?></p>							
							
							<p><?php echo $art_desc; ?></p>
							
						</div>
					</section><!--end of scrollspy secion-->						    
				    <?php endwhile; endif; wp_reset_postdata(); ?>							

									
				    <main id="the-content" class="entry-content" itemprop="articleBody" role="main">
					    <?php the_content(); ?>
					</main> <!-- end article section -->
										
					<footer class="article-footer">
						 <?php wp_link_pages(); ?>
					</footer> <!-- end article footer -->						

									
				</article> <!-- end article -->
		    
		    	<?php endwhile; endif; ?>	
			</main>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->	  
	</div>
</div>
  

<?php get_footer(); ?>