<?php
    function registerGutenbergCategory( $categories ) {
        $categories[] = array(
            'slug'  => 'robotcode-category',
            'title' => 'robotcode'
        );
    
        return $categories;
    }
    add_filter( 'block_categories_all' , 'registerGutenbergCategory' );