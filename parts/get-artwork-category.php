<?php

function get_artwork_data(){
    //get the category assigned to the page
    $artwork_cat    = get_the_category();
    $artwork_term   = $artwork_cat[0]->slug;
    
    // echo '<pre>';
    // print_r( $artwork_cat );
    // echo '</pre>';

    $the_query = new WP_Query( array(
        'post_type' => 'artwork',
        'orderby' => 'date',
        'order' => 'ASC',        
        'tax_query' => array(
            array (
                'taxonomy' => 'artwork_project',
                'field' => 'slug',
                'terms' => $artwork_term
            )
        )
    ) );
    
    return $the_query;
    
}

// while ( $the_query->have_posts() ) :
//     $the_query->the_post();
//     // Show Posts ...
// endwhile;

