<?php
// TEMA FIKS
function klitandersen_theme_setup() {
    add_theme_support('menus');

    register_nav_menus([
        'main-menu' => __('Main Menu', 'klitandersen'),
    ]);
}
add_action('after_setup_theme', 'klitandersen_theme_setup');

// Indlæs style's? Troede jeg????'
function klitandersen_enqueue_styles() {
    wp_enqueue_style('klitandersen-style', get_stylesheet_uri());
}

// Tilføj JS
  wp_enqueue_script('plp-script', get_template_directory_uri() . '/assets/js/plp.js', array('jquery'), '1.0.0', true);

add_action('wp_enqueue_scripts', 'klitandersen_enqueue_styles');

// Stopper Gutenberg editor - for den ka' vi ik' li' 
add_filter('use_block_editor_for_post', '__return_false', 10);

/* ____________________________________________________________________ */
/* POLYLANG LAND */

// Quickfiks - chrasher ved min egen bliver sat ind?????
/* function plp_register_stylesheet() {
    wp_enqueue_style('plp-style', get_template_directory_uri() . '/assets/css/plp.css', array(), '1.0.0', 'all');
} */
        function plp_register_stylesheet() {
            wp_enqueue_style("klitandersen-style", get_template_directory_uri() ."/style.css");
        }
        add_action('wp_enqueue_scripts', 'plp_register_stylesheet');


// Deaktiver Gutenberg editor igen (backup hook)
function plp_disable_gutenberg() {
    add_filter('use_block_editor_for_post', '__return_false', 10);
}
add_action('init', 'plp_disable_gutenberg');

function plp_register_strings() {
    pll_register_string("Home Page", "A screen unseen holds<br>no value.");
    pll_register_string("Home Page", "If you want to sell more, communicate better, or strengthen your customer service – you've come to the right place.
        These are just a few examples of the business value you can expect from your digital signage.");
}
add_action('init', 'plp_register_strings');




/* ____________________________________________________________________ */
/* LOOP TIL BLOG CARDS (I hate this place)*/
function register_blog_cards_post_type() {
    register_post_type('blog_card', [
        'labels' => [
            'name' => 'Blog Cards',
            'singular_name' => 'Blog Card',
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'blog-card'],
        'supports' => ['title'],
        'show_in_rest' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-format-image',
    ]);
}
add_action('init', 'register_blog_cards_post_type');

/* ____________________________________________________________________ */
/* LOOP TIL CASE CARDS I hate this place EVEN MORE)*/
function register_case_post_type() {
    register_post_type('case', [
        'labels' => [
            'name' => 'Cases',
            'singular_name' => 'Case',
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'cases'],
        'supports' => ['title'],
        'show_in_rest' => true,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-portfolio',
    ]);
}
add_action('init', 'register_case_post_type');

/* ____________________________________________________________________ */
/* SOLO CASES */
function register_custom_post_type_solo_case() {
    register_post_type('solo_case', array(
        'labels' => array(
            'name' => __('Solo Cases'),
            'singular_name' => __('Solo Case')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array(
            'slug' => 'cases',
            'with_front' => false
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'show_in_rest' => true
    ));
}
add_action('init', 'register_custom_post_type_solo_case');

/* ____________________________________________________________________ */
/* SOLO BLOGS ?? BLOG POSTS */
function register_custom_post_type_blog_post() {
    register_post_type('blog_post', array(
        'labels' => array(
            'name' => __('Blog Posts'),
            'singular_name' => __('Blog Post')
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'blog', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 6,
        'menu_icon' => 'dashicons-edit',
        'show_in_rest' => true
    ));
}
add_action('init', 'register_custom_post_type_blog_post');
