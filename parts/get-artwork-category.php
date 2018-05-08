<?php

function get_artwork_data(){
    //get the category assigned to the page
    $id = get_the_ID();
    $artwork_cat    = get_the_terms( $id, 'artwork_project');
    $artwork_term   = $artwork_cat[0]->slug;
    
    // echo '<pre>';
    // print_r( $artwork_term );
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


