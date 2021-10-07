<?php
/* Template name: Realizacje */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;


Timber::render(['page-realizacje.twig'], $context);