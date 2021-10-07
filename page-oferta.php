<?php
/* Template name: Oferta */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;


Timber::render(['page-oferta.twig'], $context);