<?php 
/**
 * The front page template
 */

get_header('home'); ?>

  <div class="off-canvas-wrapper">
    <div class="off-canvas position-left reveal-for-medium" id="offCanvas" data-off-canvas>
      <!-- Your menu or Off-canvas content goes here -->
      <div class="go-c-off-canvas">
      	
		<div class="go-c-off-canvas__site-title">
			<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
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
		<header class="header" role="banner">
					
			<!--off -canvas navigation with top bar for desktop widths-->
			 <?php get_template_part( 'parts/nav', 'title-bar-home' ); ?>
 
		</header> <!-- end .header -->	 
	
        <div class="site-content">
        
            <?php while ( have_posts() ) : the_post();
                if ( 'page' == get_option( 'show_on_front' ) ) {
                    $thumb_url   	 = get_the_post_thumbnail_url( $post, 'large' );
    			    $description 	 = $post->post_excerpt;
    				$content	 	 = get_the_content();                
                }
            ?>
            
                <article <?php post_class('grid-x go-c-front-page'); ?> >
                    <div class="medium-10 cell go-c-front-page__hero" style="background-image:url(<?php echo esc_url( $thumb_url ); ?>)" role="presentaion" >
                        
                        <div class="go-c-front-page__content">
                            <?php echo $content; ?>
                        </div>
                        
                    </div>
                </article>
            
            <?php endwhile; ?>
        
        </div><!--.site-content-->
   		
   		<?php get_footer('home'); ?>     
      
    </div> <!-- end .off-canvas-content -->  
  
  </div> <!--end of off-canvas-wrapper-->

		


