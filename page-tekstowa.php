<?php
/* Template name: Strona tekstowa */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;


Timber::render(['page-tekstowa.twig'], $context);