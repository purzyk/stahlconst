<?php

/**
 * Register scripts and styles and enqueue them
 */
function base_camp_scripts_and_styles()
{
    
    // Register styles
    wp_register_style('wptheme-styles',  get_template_directory_uri().'/static/css/styles.css', [], '', 'all');
    // Register scripts
    wp_register_script('wptheme-vendor', get_template_directory_uri(). '/static/js/vendor.js', [], '', true);
    wp_register_script('wptheme-scripts', get_template_directory_uri().'/static/js/scripts.js', ['wptheme-vendor'], '', true);

    // Enqueue scripts and styles
    wp_enqueue_script('wptheme-scripts');
    wp_enqueue_script('wptheme-vendor');
    wp_enqueue_style('wptheme-styles');

}

add_action('wp_enqueue_scripts', 'base_camp_scripts_and_styles', 999);


add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_style( 'twentytwenty-custom-block-editor-styles',\
    get_template_directory_uri().'/static/css/styles.css',\
        false, wp_get_theme()->get( 'Version' ));
} );