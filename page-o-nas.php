<?php
/* Template name: O nas */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;


Timber::render(['page-o_nas.twig'], $context);