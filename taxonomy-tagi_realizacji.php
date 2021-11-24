<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$templates = array( 'taxonomy.twig', 'index.twig' );

$context = Timber::context();

$context['title'] = single_tag_title( '', false );
$taxID = get_queried_object_id();
$context['taxID'] = $taxID;
$context['pagination'] = Timber::get_pagination($pagination_mid_size);
Timber::render( $templates, $context );