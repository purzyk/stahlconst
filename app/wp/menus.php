<?php

/**
 * Registers a custom Navigation Menu in the custom menu editor
 */
function wptheme_register_menus()
{
    register_nav_menu('main_menu', __('Main menu', 'wptheme'));
    register_nav_menu('mobile_menu', __('Mobile menu', 'wptheme'));
}

add_action('after_setup_theme', 'wptheme_register_menus');