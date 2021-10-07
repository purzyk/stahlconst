<?php
/* Template name: Home */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;


Timber::render(['page-home.twig'], $context);