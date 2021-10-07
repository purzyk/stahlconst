<?php

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

/* Disable post format */
    add_action('after_setup_theme', 'remove_post_format', 15);
    function remove_post_format() {
        remove_theme_support('post-formats');
    }


/* SVG support */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
   }
   add_filter('upload_mimes', 'cc_mime_types');


/* Additional secure stuff */
remove_action('wp_head', 'wp_generator');

function my_secure_generator( $generator, $type ) {
	return '';
}
add_filter( 'the_generator', 'my_secure_generator', 10, 2 );

function my_remove_src_version( $src ) {
	global $wp_version;

	$version_str = '?ver='.$wp_version;
	$offset = strlen( $src ) - strlen( $version_str );

	if ( $offset >= 0 && strpos($src, $version_str, $offset) !== FALSE )
		return substr( $src, 0, $offset );

	return $src;
}
add_filter( 'script_loader_src', 'my_remove_src_version' );
add_filter( 'style_loader_src', 'my_remove_src_version' );

add_filter('xmlrpc_enabled', '__return_false');


/**
 * Return url of compiled style or script file
 *
 * @since 1.0.0
 *
 * @param $key
 *
 * @return string
 */
function assets($key)
{
    $manifest_string = file_get_contents(get_template_directory() . '/static/manifest.json');
    $manifest_array  = json_decode($manifest_string, true);

    return get_stylesheet_directory_uri() . '/static/' . $manifest_array[$key];
}


/**
 * Return the value of an environment variable.
 * Return default value if environment variable is false.
 *
 * @param $env_variable
 * @param $default
 *
 * @return array|false|string
 */
function bc_env($env_variable, $default)
{
    return getenv($env_variable) ? getenv($env_variable) : $default;
}

/**
 * Return random string
 *
 * @since 1.9.0
 *
 * @param int $length
 * @return void
 */
function bc_random_string($length)
{
    return substr(bin2hex(random_bytes($length)), 0, $length);
}

/**
 * Return true if assets file exists
 *
 * @param string $key
 * @return boolean
 */
function has_assets($key)
{
    $manifest_string = file_get_contents(get_template_directory() . '/static/manifest.json');
    $manifest_array  = json_decode($manifest_string, true);

    return @file_get_contents(get_template_directory() . '/static/' . $manifest_array[$key]);
}

add_filter( 'allowed_block_types_all', 'wpse324908_allowed_block_types', 10, 2 );

function wpse324908_allowed_block_types( $allowed_blocks, $post ) {    
   $allowed_blocks = array(
    );     
    return $allowed_blocks;    
}



add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('formatselect', 'bold', 'link' );
	
    $toolbars['With list' ] = array();
	$toolbars['With list' ][1] = array('bold', 'bullist' );

	if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
	{
	    unset( $toolbars['Full' ][2][$key] );
	}

	
	unset( $toolbars['Basic' ] );

	
	return $toolbars;
}
add_filter( 'tiny_mce_before_init', function( $settings ){

	$settings['block_formats'] = 'Paragraph=p;Nagłówek H2=h2;';

	return $settings;

} );