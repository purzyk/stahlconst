<?php

function base_camp_register_sidebars()
{
    register_sidebar([
        'name'          => __('Main Sidebar', 'wptheme'),
        'id'            => 'main-sidebar',
    ]);
    register_sidebar([
        'name'          => __('Footer Sidebar', 'wptheme'),
        'id'            => 'footer-sidebar',
    ]);
}

add_action('widgets_init', 'base_camp_register_sidebars');
