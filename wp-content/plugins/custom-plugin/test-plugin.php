<?php
/**
* Plugin Name: test-plugin
* Plugin URI: https://www.your-site.com/
* Description: Test.
* Version: 0.1
* Author: Ascent
* Author URI: https://www.your-site.com/
**/


// Our custom post type function
function create_posttype() {
 
    register_post_type( 'Product',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Product' ),
                'singular_name' => __( 'Product' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Product'),
            'show_in_rest' => true,
			'menu_icon'           => 'dashicons-admin-plugins',
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


/*
* Creating a function to create our CPT
*/

function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Product', 'Post Type General Name', 'thompson' ),
            'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'thompson' ),
            'menu_name'           => __( 'Product', 'thompson' ),
            'parent_item_colon'   => __( 'Parent Product', 'thompson' ),
            'all_items'           => __( 'All Product', 'thompson' ),
            'view_item'           => __( 'View Product', 'thompson' ),
            'add_new_item'        => __( 'Add New Product', 'thompson' ),
            'add_new'             => __( 'Add New', 'thompson' ),
            'edit_item'           => __( 'Edit Product', 'thompson' ),
            'update_item'         => __( 'Update Product', 'thompson' ),
            'search_items'        => __( 'Search Product', 'thompson' ),
            'not_found'           => __( 'Not Found', 'thompson' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'thompson' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Product', 'thompson' ),
            'description'         => __( 'See All Products', 'thompson' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'Product-category' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
			            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        ); 
        
        $labels = array(
            'name' => _x( 'Product Category', 'taxonomy general name' ),
            'singular_name' => _x( 'Product Category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Product Category' ),
            'popular_items' => __( 'Popular Product Category' ),
            'all_items' => __( 'All Product Category' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Product Category' ), 
            'update_item' => __( 'Update Product Category' ),
            'add_new_item' => __( 'Add New Product Category' ),
            'new_item_name' => __( 'New Product Category Name' ),
            'separate_items_with_commas' => __( 'Separate Product Category with commas' ),
            'add_or_remove_items' => __( 'Add or remove Product Category' ),
            'choose_from_most_used' => __( 'Choose from the most used Product Category' ),
		
            'menu_name' => __( 'Product Category' ),
          ); 


        register_taxonomy('Product-category','Product Category',array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'Product-category' ),
          ));
         
        // Registering your Custom Post Type
        register_post_type( 'Product', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type', 0 );



    
    add_theme_support( 'post-thumbnails' );



    function na_remove_slug( $post_link, $post, $leavename ) {
        if ( 'Product' != $post->post_type || 'publish' != $post->post_status ) {
            return $post_link;
        }
        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
        return $post_link;
    }
    add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );


    function na_parse_request( $query ) {
        if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
            return;
        }
        if ( ! empty( $query->query['name'] ) ) {
            $query->set( 'post_type', array( 'post', 'Product', 'page' ) );
        }
    }
    add_action( 'pre_get_posts', 'na_parse_request' );

