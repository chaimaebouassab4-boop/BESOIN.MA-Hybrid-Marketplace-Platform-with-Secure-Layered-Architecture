<?php
/**
 * The header for our theme
 * @package BESOIN
 */

if (!defined('ABSPATH')) exit;

$logo_path = get_template_directory() . '/images/besoinLogo-removebg-preview.png';
$logo_uri  = get_template_directory_uri() . '/images/besoinLogo-removebg-preview.png';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<header class="besoin-header">
    <nav class="besoin-navbar" aria-label="<?php esc_attr_e('Navigation principale', 'besoin'); ?>">
        <div class="besoin-container">

            <!-- LOGO -->
            <a class="besoin-logo" href="<?php echo esc_url(home_url('/')); ?>">
                <?php if (file_exists($logo_path)) : ?>
                    <img src="<?php echo esc_url($logo_uri); ?>" alt="<?php bloginfo('name'); ?>" class="logo-img">
                <?php else : ?>
                    <span class="navbar-brand fw-bold">BESOIN<span>.MA</span></span>
                <?php endif; ?>
            </a>

            <!-- SEARCH BAR -->
            <div class="besoin-search-wrapper">
                <form method="get" action="<?php echo esc_url(home_url('/recherche')); ?>" class="besoin-search-bar" id="besoin-search-form">

                    <!-- Type dropdown -->
                    <div class="dropdown">
                        <button class="besoin-drop-btn dropdown-toggle" type="button"
                                id="keywordsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-grid"></i>
                            <span class="drop-label" id="keywords-label">Catégorie</span>
                        </button>
                        <ul class="dropdown-menu besoin-dropdown-menu" aria-labelledby="keywordsDropdown">
                            <li><a class="dropdown-item keywords-item" href="#" data-value="service">Services</a></li>
                            <li><a class="dropdown-item keywords-item" href="#" data-value="emploi">Emplois</a></li>
                            <li><a class="dropdown-item keywords-item" href="#" data-value="business">Business</a></li>
                            <li><a class="dropdown-item keywords-item" href="#" data-value="produit">Produits</a></li>
                        </ul>
                    </div>

                    <div class="besoin-divider"></div>

                    <!-- Champ recherche -->
                    <input type="search" name="q" id="search-input"
                           class="besoin-input"
                           placeholder="Que recherchez-vous ?"
                           autocomplete="off">

                    <input type="hidden" name="type" value="service" id="srch_type">
                    <input type="hidden" name="location" value="" id="srch_location">

                    <div class="besoin-divider"></div>

                    <!-- Location dropdown -->
                    <div class="dropdown">
                        <button class="besoin-drop-btn dropdown-toggle" type="button"
                                id="locationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-geo-alt"></i>
                            <span class="drop-label" id="location-label">Tout le Maroc</span>
                        </button>
                        <ul class="dropdown-menu besoin-dropdown-menu" aria-labelledby="locationDropdown">
                            <li><a class="dropdown-item location-item" href="#" data-value="">Tout le Maroc</a></li>
                            <?php foreach (besoin_get_locations() as $location) : ?>
                                <li>
                                    <a class="dropdown-item location-item" href="#"
                                       data-value="<?php echo esc_attr($location['name']); ?>">
                                        <?php echo esc_html($location['name']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Bouton -->
                    <button type="submit" class="besoin-search-btn" id="srch_button">
                        <i class="bi bi-search"></i> Rechercher
                    </button>

                </form>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="besoin-actions">
                <a href="<?php echo esc_url(home_url('/connexion')); ?>" class="besoin-action-btn btn-sign-in">
                    <i class="bi bi-box-arrow-in-right"></i><span>Connexion</span>
                </a>

                                

                <a href="<?php echo esc_url(home_url('/inscription')); ?>" class="besoin-action-btn btn-add-business">
                    <i class="bi bi-plus-circle"></i><span>Créer un compte</span>
                </a>
            </div>

        </div>
    </nav>
</header>