<?php
/**
 * BESOIN Theme Functions
 *
 * @package BESOIN
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Return a cache-busting version for local assets.
 */
function besoin_asset_version($relative_path) {
    $absolute_path = get_template_directory() . $relative_path;

    if (file_exists($absolute_path)) {
        return (string) filemtime($absolute_path);
    }

    return wp_get_theme()->get('Version');
}

// Theme Setup
add_action('after_setup_theme', 'besoin_setup');
function besoin_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );
    add_theme_support('customize-selective-refresh-widgets');

    register_nav_menus(
        array(
            'primary' => __('Menu Principal', 'besoin'),
            'footer'  => __('Menu Footer', 'besoin'),
            'mobile'  => __('Menu Mobile', 'besoin'),
        )
    );

    add_image_size('listing-card', 400, 300, true);
    add_image_size('hero-large', 1200, 800, true);
}

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'besoin_scripts');
function besoin_scripts() {
    $theme_version = wp_get_theme()->get('Version');

    // Keep root style.css loaded for WordPress theme stylesheet compatibility.
    wp_enqueue_style('besoin-theme-style', get_stylesheet_uri(), array(), $theme_version);

    // Bootstrap 5.3.3 CSS + Bootstrap Icons
    wp_enqueue_style(
        'besoin-bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        array(),
        '5.3.3'
    );

    wp_enqueue_style(
        'besoin-bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        array(),
        '1.11.3'
    );

    // Main theme stylesheet (required): /css/style.css
    $main_css = '/css/style.css';
    wp_enqueue_style(
        'besoin-main-style',
        get_template_directory_uri() . $main_css,
        array('besoin-bootstrap-css', 'besoin-bootstrap-icons', 'besoin-theme-style'),
        besoin_asset_version($main_css)
    );

    // Additional theme styles
    $styles = array(
        '/css/header.css' => 'besoin-header-style',
        '/css/dev.css'    => 'besoin-dev-style',
    );

    foreach ($styles as $path => $handle) {
        if (file_exists(get_template_directory() . $path)) {
            wp_enqueue_style(
                $handle,
                get_template_directory_uri() . $path,
                array('besoin-main-style'),
                besoin_asset_version($path)
            );
        }
    }

    // Hero stylesheet
    $hero_css = '/css/hero.css';
    if (file_exists(get_template_directory() . $hero_css)) {
        wp_enqueue_style(
            'besoin-hero',
            get_template_directory_uri() . $hero_css,
            array('besoin-main-style'),
            besoin_asset_version($hero_css)
        );
    }

    // Bootstrap JS bundle
    wp_enqueue_script(
        'besoin-bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.3.3',
        true
    );

    // Theme scripts
    $scripts = array(
        '/js/main.js'   => 'besoin-main',
        '/js/custom.js' => 'besoin-custom',
        '/js/header.js' => 'besoin-header-js',
    );

    foreach ($scripts as $path => $handle) {
        if (file_exists(get_template_directory() . $path)) {
            wp_enqueue_script(
                $handle,
                get_template_directory_uri() . $path,
                array('besoin-bootstrap-js'),
                besoin_asset_version($path),
                true
            );
        }
    }

    // Pass AJAX URL + nonce to main.js
    if (wp_script_is('besoin-main', 'enqueued')) {
        wp_localize_script(
            'besoin-main',
            'besoin_ajax',
            array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('besoin_nonce'),
            )
        );
    }
}

// Admin styles
add_action('admin_enqueue_scripts', 'besoin_admin_styles');
function besoin_admin_styles() {
    $admin_css = '/css/admin.css';

    if (file_exists(get_template_directory() . $admin_css)) {
        wp_enqueue_style(
            'besoin-admin',
            get_template_directory_uri() . $admin_css,
            array(),
            besoin_asset_version($admin_css)
        );
    }
}

// Get locations (mock function - replace with API call)
function besoin_get_locations() {
    return array(
        array('id' => 1, 'name' => 'Casablanca'),
        array('id' => 2, 'name' => 'Rabat'),
        array('id' => 3, 'name' => 'Marrakech'),
        array('id' => 4, 'name' => 'Tanger'),
        array('id' => 5, 'name' => 'Fes'),
        array('id' => 6, 'name' => 'Agadir'),
        array('id' => 7, 'name' => 'Tetouan'),
        array('id' => 8, 'name' => 'Oujda'),
    );
}

// Custom search rewrite
add_action('init', 'besoin_rewrite_rules');
function besoin_rewrite_rules() {
    add_rewrite_rule('^recherche/?$', 'index.php?pagename=recherche', 'top');
    add_rewrite_rule('^categorie/([^/]+)/?$', 'index.php?category_name=$matches[1]', 'top');
}

// AJAX handler for search suggestions
add_action('wp_ajax_besoin_search_suggestions', 'besoin_search_suggestions');
add_action('wp_ajax_nopriv_besoin_search_suggestions', 'besoin_search_suggestions');

function besoin_search_suggestions() {
    check_ajax_referer('besoin_nonce', 'nonce');

    $term = isset($_GET['term']) ? sanitize_text_field(wp_unslash($_GET['term'])) : '';

    // Mock suggestions - replace with actual DB/API query
    $suggestions = array(
        array('title' => 'Developpeur Web', 'type' => 'service', 'url' => '/service/developpeur-web'),
        array('title' => 'Designer Graphique', 'type' => 'service', 'url' => '/service/designer-graphique'),
        array('title' => 'Plombier Casablanca', 'type' => 'service', 'url' => '/service/plombier-casablanca'),
    );

    if ($term !== '') {
        wp_send_json_success($suggestions);
    }

    wp_send_json_success(array());
}

// Disable WordPress admin bar for non-admins
add_action('after_setup_theme', 'besoin_remove_admin_bar');
function besoin_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

// Custom excerpt length
add_filter('excerpt_length', 'besoin_excerpt_length');
function besoin_excerpt_length($length) {
    return 20;
}

// Add custom body classes
add_filter('body_class', 'besoin_body_classes');
function besoin_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'homepage';
    }

    return $classes;
}
// Connexion à la base métier besoin_data
function besoin_data_db() {
    static $db = null;

    if ($db === null) {
        $db = new wpdb(DB_USER, DB_PASSWORD, 'besoin_data', DB_HOST);
        $db->set_charset($db->dbh, 'utf8mb4');
    }

    return $db;
}
function besoin_get_featured_business($limit = 6) {
    $db = besoin_data_db();

    $sql = $db->prepare("
        SELECT id, name, address, phone, website, facebook, instagram
        FROM business
        ORDER BY id DESC
        LIMIT %d
    ", $limit);

    return $db->get_results($sql);
}
add_action('wp_enqueue_scripts', function() {

    wp_enqueue_style(
        'besoin-hero-style',
        get_stylesheet_directory_uri() . '/assets/css/hero.css',
        [],
        '1.0.0'
    );

    wp_enqueue_script(
        'besoin-hero-script',
        get_stylesheet_directory_uri() . '/assets/js/hero.js',
        [],
        '1.0.0',
        true // important → charge en bas du body
    );
});