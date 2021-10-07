<?php
/* Template name: Kariera */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;


Timber::render(['page-kariera.twig'], $context);