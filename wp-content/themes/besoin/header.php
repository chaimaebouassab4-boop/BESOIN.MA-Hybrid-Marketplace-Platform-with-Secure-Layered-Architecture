<?php
/**
 * Header template - Zone A
 * Architecture: WordPress UI + Laravel API (future)
 *
 * @package Becoin
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/webp" href="<?php echo get_template_directory_uri(); ?>/images/besoin-favicon.webp">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e('Skip to content', 'becoin'); ?>
    </a>

    <header class="main-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container px-md-0">

                <!-- Logo -->
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.webp"
                         alt="<?php bloginfo('name'); ?>"
                         class="img-fluid"
                         height="40">
                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse main-navbar" id="navbarNav">
                    <div class="d-md-flex align-items-center header-search-items">

                        <!-- Search Block -->
                        <div class="main-header-search m-auto">

                            <!-- Keywords Dropdown -->
                            <ul class="navbar-nav mb-2 mb-lg-0 ms-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle location-drop-head"
                                       href="#"
                                       id="keywordsDropdown"
                                       role="button"
                                       data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <?php echo besoin_icon_keywords(); ?>
                                        <span class="keyword-label">Keywords</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="keywordsDropdown">
                                        <li data-value="1">
                                            <a class="dropdown-item keywords-item" href="#">Keywords</a>
                                        </li>
                                        <li data-value="2">
                                            <a class="dropdown-item keywords-item" href="#">Business</a>
                                        </li>
                                        <li data-value="3">
                                            <a class="dropdown-item keywords-item" href="#">Product &amp; Services</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- Search Form -->
                            <form method="get"
                                  action="<?php echo esc_url(home_url('/search-page/')); ?>"
                                  class="position-relative besoin-search-form"
                                  id="besoin-search-form">
                                <input class="header-search-bar"
                                       type="search"
                                       name="q"
                                       placeholder="What are you looking for?"
                                       aria-label="Search"
                                       id="search-input"
                                       autocomplete="off">
                                <input type="hidden" name="type" value="" class="srch_type" id="srch_type">
                                <input type="hidden" name="location" value="" class="srch_location" id="srch_location">
                                <button type="submit" class="srch-form-submit" style="display:none;"></button>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/search.svg"
                                     class="search-icon position-absolute srch-icon"
                                     alt="search">
                            </form>

                            <!-- Location Dropdown -->
                            <ul class="navbar-nav ms-0">
                                <li class="nav-item dropdown ms-md-2 location-spacing">
                                    <a class="nav-link dropdown-toggle location-drop-head"
                                       href="#"
                                       id="locationDropdown"
                                       role="button"
                                       data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <?php echo besoin_icon_location(); ?>
                                        <span class="location-label">Location</span>
                                    </a>
                                    <ul class="dropdown-menu main-locations" aria-labelledby="locationDropdown">
                                        <li data-value="0">
                                            <a class="dropdown-item location-item" href="#">All Location</a>
                                        </li>
                                        <?php
                                        /**
                                         * Locations from API (Laravel backend).
                                         * TODO: Replace with real API call when Laravel is connected.
                                         * @see besoin_get_locations() in functions.php
                                         */
                                        $locations = besoin_get_locations();
                                        foreach ($locations as $location) : ?>
                                            <li data-value="<?php echo esc_attr($location['id']); ?>">
                                                <a class="dropdown-item location-item" href="#">
                                                    <?php echo esc_html($location['name']); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.main-header-search -->

                        <!-- Search Button -->
                        <div class="search-button">
                            <button type="button"
                                    id="srch_button"
                                    class="btn header-search-button"
                                    onclick="document.getElementById('besoin-search-form').submit();">
                                Search
                            </button>
                        </div>

                    </div><!-- /.header-search-items -->

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between align-items-center sign-in-button">
                        <a href="<?php echo esc_url(home_url('/sign-in/')); ?>"
                           class="d-flex align-items-center text-decoration-none sign-in-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sign-in.svg"
                                 alt="Sign In" class="sign-icon">
                            <span class="ms-2">Sign In</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/add-business/')); ?>"
                           class="d-flex align-items-center text-decoration-none head-btn head-btn-spacing">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/add-business.svg"
                                 alt="Add Business" class="sign-icon">
                            <span class="ms-2">Add Business</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/deal-list/')); ?>"
                           class="d-flex align-items-center text-decoration-none head-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/deal-list.svg"
                                 alt="Deal List" class="sign-icon">
                            <span class="ms-2">Deal List</span>
                        </a>
                    </div>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
    </header>