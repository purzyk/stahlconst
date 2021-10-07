<?php
/* Template name: Kontakt */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;


Timber::render(['page-kontakt.twig'], $context);