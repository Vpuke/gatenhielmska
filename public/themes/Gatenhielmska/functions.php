<?php

declare(strict_types=1);

// Register plugin helpers.
require get_theme_file_path('includes/plugins/plate.php');

// Set theme defaults.
add_action('after_setup_theme', function () {
    // Disable the admin toolbar.
    show_admin_bar(false);

    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 theme support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);


    // Register Event custom post type. / Vigge
    require get_template_directory() . '/post-types/events.php';

    // Register Event Type Taxonomy to Event custom post type // Vigge
    require get_template_directory() . '/taxonomies/event-type.php';

    // Register News custom post type. / Vigge
    require get_template_directory() . '/post-types/news.php';

    // Register Tenants custom post type. / Vigge
    require get_template_directory() . '/post-types/about.php';

    // Register Management custom post type. / Vigge
    require get_template_directory() . '/post-types/contact.php';

    // Registration of event field group
    require get_template_directory() . '/fields/contact.php';

    // Registration of contact-information field group
    require get_template_directory() . '/fields/contact-information.php';

    // Registration of timeline field group
    require get_template_directory() . '/fields/timeline.php';

    // Registration of event field group
    require get_template_directory() . '/fields/about.php';

    // Registration of event field group
    require get_template_directory() . '/fields/event.php';

    // Registration of news field group

    require get_template_directory() . '/fields/news.php';

    // Register navigation menus.
    register_nav_menus([
        'navigation' => __('Navigation', 'wordplate'),
    ]);
});


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/styles/app.css');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/scripts/app.js', [], false, true);
});

function custom_add_google_fonts()
{
    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=EB+Garamond|Lato&display=swap', false);
}
add_action('wp_enqueue_scripts', 'custom_add_google_fonts');


// Remove JPEG compression.
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);
