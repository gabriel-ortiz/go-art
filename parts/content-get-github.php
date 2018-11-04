<?php
/**
 * 
 * Template part for getting github repos for display
 * 
 * @return Transient JSON
 * 
 */
 
 function get_github(){
    
    //get transient if exists
    $github_json    = get_transient('github_data');
    
    //if not, make request to github repository
    //https://api.github.com/users/gabrielo-cuc/repos?sort=created
    
    $url = 'https://api.github.com/users/gabriel-ortiz/repos?sort=created';
    
    if( ! $github_json ){
        $request = wp_remote_get( $url );
    }else{
        return $github_json;
    }
    
    //check for response
    
    if( $request['response']['code'] !== 200 ){
        
    }else{
        $github_json = json_decode( $request['body'], true );
        
        set_transient( 'github_data', $github_json,  20 * MINUTE_IN_SECONDS );
    }
    
    return $github_json;
    
 }