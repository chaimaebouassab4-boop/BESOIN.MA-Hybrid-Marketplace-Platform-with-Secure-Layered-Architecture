<?php

/**
 * Template Name: Home Page Template
 */

get_header();
?>

<section class="main-sections ps-section mt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5">
                <div class="banner-content">
                    <h1 class="banner-head">80,000 Talented Service Providers</h1>
                    <p class="banner-desc">Sortlist helps you to describe your needs, meet
                        relevant providers, and hire the best one.
                    </p>
                    <a href="#" class="align-items-center text-decoration-none sign-in-btn">
                        Get started - it’s free!
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-7">
                <div id="carouselExampleIndicators" class="carousel slide banner-image text-center"
                    data-bs-ride="carousel">

                    <!-- Slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/banner-image.webp" class="d-block img-fluid w-100" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/banner-image.webp" class="d-block img-fluid w-100" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/banner-image.webp" class="d-block img-fluid w-100" alt="Slide 3">
                        </div>
                    </div>
                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-sections verify-section">
    <div class="container-fluid">
        <h2 class="main-head text-center">Nos meilleurs fournisseurs vérifiés</h2>
        <div class="owl-carousel slider-spacing" id="carouselVerification">
            <?php

            if (function_exists('besoin_api_fetch_data')) {
                if (!empty(premiumSuppliers())) {
                    foreach (premiumSuppliers() as $premiumSupplier) { ?>
                        <div class="item">
                            <div class="verified-image">
                                <!-- public/uploads/images/ ------- >/uploads/images/ -->
                                <img src="<?= besonAppLink(); ?>/uploads/images/<?= $premiumSupplier->value ?>" alt="verify" class="img-fluid verified-logo-image">
                            </div>
                            <div class="item-spacing">
                                <h3><?= $premiumSupplier->name ?></h3>
                                <!-- <h6>To The Sky</h6> -->
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex align-items-center pv-bx">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/promoted.svg" alt="promoted icon" class="me-2">
                                    <p class="mb-0">Promoted</p>
                                </div>
                                <div class="d-flex align-items-center pv-bx">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="verified icon" class="me-2">
                                    <p class="mb-0">Verified</p>
                                </div>
                            </div>
                            <p class="verified-para">
                                <?= substr($premiumSupplier->about, 0, 100); ?>
                            </p>
                        </div>
            <?php        }
                }
            }
            ?>
            <!-- <div class="item">
                <div class="verified-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verify1.webp" alt="verify" class="img-fluid verified-logo-image">
                </div>
                <div class="item-spacing">
                    <h3>ArtX Pro</h3>
                    <h6>To The Sky</h6>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center pv-bx">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/promoted.svg" alt="promoted icon" class="me-2">
                        <p class="mb-0">Promoted</p>
                    </div>
                    <div class="d-flex align-items-center pv-bx">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="verified icon" class="me-2">
                        <p class="mb-0">Verified</p>
                    </div>
                </div>
                <p class="verified-para">We’re ArtX Pro. We provides Promotional
                    and production service to brand or
                    business. We’ve made hundreds of
                    promotion video and multimedia…</p>
            </div>
            <div class="item">
                <div class="verified-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verify2.webp" alt="verify" class="img-fluid verified-logo-image">
                </div>
                <div class="item-spacing">
                    <h3>PRINZIP E GmbH</h3>
                    <h6>Entschieden. Effizient.
                        Ergebnisorientiert. So ist unsere
                        Arbeit, und dafür stehen wir ein.
                    </h6>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center pv-bx">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/promoted.svg" alt="promoted icon" class="me-2">
                        <p class="mb-0">Promoted</p>
                    </div>
                    <div class="d-flex align-items-center pv-bx">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="verified icon" class="me-2">
                        <p class="mb-0">Verified</p>
                    </div>
                </div>
                <p class="verified-para">Mit rund 20 Kommunikations-
                    Expert*innen sind wir Ihr erster
                    Ansprechpartner für Markenführung und
                    Kampagnenkonzepte. Dabei sind wir…</p>
            </div>
            <div class="item">
                <div class="verified-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verify3.webp" alt="verify" class="img-fluid verified-logo-image">
                </div>
                <div class="item-spacing">
                    <h3>Namox GmbH</h3>
                    <h6>Wir skalieren Amazon Accounts!
                    </h6>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center pv-bx">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/promoted.svg" alt="promoted icon" class="me-2">
                        <p class="mb-0">Promoted</p>
                    </div>
                    <div class="d-flex align-items-center pv-bx">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="verified icon" class="me-2">
                        <p class="mb-0">Verified</p>
                    </div>
                </div>

                <p class="verified-para">Die Namox GmbH ist eine Amazon
                    Performance Marketing Agentur. Wir
                    skalieren Amazon Accounts durch
                    Performance getriebenes Design…</p>
            </div>
            <div class="item">
                <div class="verified-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verify4.webp" alt="verify" class="img-fluid verified-logo-image">
                </div>
                <div class="item-spacing">
                    <h3>SPRDLUX EVENTS</h3>
                    <h6>WE CREATE MEMORIES THROUGH
                        EXPERIENCES
                    </h6>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center pv-bx">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/promoted.svg" alt="promoted icon" class="me-2">
                        <p class="mb-0">Promoted</p>
                    </div>
                    <div class="d-flex align-items-center pv-bx">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="verified icon" class="me-2">
                        <p class="mb-0">Verified</p>
                    </div>
                </div>
                <p class="verified-para">SPRDLUX EVENTS is een full service
                    evenementenbureau. We bedenken en
                    organiseren events, meetings, incentives
                    en congressen. Feesten waar nog lang…</p>
            </div> -->
        </div>
        <div class="owl-nav slide-arrows mb-5">
            <button type="button" role="presentation" class="left-arrow" data-bs-target="#carouselVerification">
                <span aria-label="Previous">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/left-arrow.svg" alt="left-arrow">
                </span>
            </button>
            <button type="button" role="presentation" class="right-arrow" data-bs-target="#carouselVerification">
                <span aria-label="Next">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/right-arrow.svg" alt="right-arrow">
                </span>
            </button>
        </div>
    </div>
</section>

<section class="main-sections">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h2 class="main-head">Les Meilleures Offres du Moment</h2>
            </div>
            <div class="col-md-3 text-end">
                <a href="#" class="d-inline-block view-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/view-icon.svg" alt="Filter">
                </a>
            </div>
        </div>
        <!-- Carousel Container -->
        <div id="carouselMoment" class="owl-carousel offer-spacing">

            <?php
            if (function_exists('besoin_api_fetch_data')) {
                $allDeals = allDeals();
                foreach ($allDeals as $key => $deal) {
            ?>
                    <div class="item position-relative">
                        <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/deal-img2.webp" class="d-block img-fluid deal-images" alt="Slide 2"> -->

                        <?php if (!empty($deal->small_image)) : ?>
                            <img src="<?php echo esc_url(besonAppLink() . '/uploads/' . $deal->small_image); ?>" class="d-block img-fluid deal-images" alt="Slide $key">
                        <?php else : ?>
                            <img src="<?php echo esc_url(besonAppLink() . '/' . besonImgPath() . '/' . defaultImage()); ?>" class="d-block img-fluid deal-images" alt="Slide $key">
                        <?php endif; ?>
                        <div class="offer-content">
                            <?php if ($deal->deal_name) { ?>
                                <h4 class="offer-head"><?= remove_special_characters_and_spaces($deal->deal_name) ?></h4>
                            <?php } ?>

                            <?php if ($deal->description) { ?>
                                <p class="offer-para"><?= remove_special_characters_and_spaces($deal->description); ?></p>
                            <?php } ?>
                            <div class="d-flex justify-content-between align-items-center pricing-bxx">
                                <p class="mb-0">
                                    <strong class="text-decoration-line-through old-price"><?= $deal->original_price ?> Dh </strong>
                                    <span class="new-price"><?= $deal->new_price        ?> Dh</span>
                                </p>
                                <p class="mb-0 acheteurs">+ 214 Acheteurs</p>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/guidance_time.svg" alt="guidance_time" class="img-fluid guidance-time">
                                <span class="offer-hrs">274h 57mn 32</span>
                            </div>
                        </div>

                        <?php
                        if ($deal->plan_id) {
                        ?>
                            <div class="d-flex position-absolute verified-bx">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/verify.svg" alt="verified" class="img-fluid verify-icon">
                                <span>Verified</span>
                            </div>
                        <?php } ?>
                        <div class="position-absolute d-flex align-items-center left-tags">
                            <span class="gift">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/gift.svg" alt="vector1">
                            </span>
                            <a href="#" class="popular-gift">Popular Gift</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <!-- <div class="item position-relative">
                <img src="<?php echo get_template_directory_uri(); ?>/images/deal-img2.webp" class="d-block img-fluid deal-images" alt="Slide 2">
                <div class="offer-content">
                    <p class="offer-para">Double room with small bedroom labranda rose</p>
                    <div class="d-flex justify-content-between align-items-center pricing-bxx">
                        <p class="mb-0">
                            <strong class="text-decoration-line-through old-price">3492 Dh </strong>
                            <span class="new-price">2200 Dh</span>
                        </p>
                        <p class="mb-0 acheteurs">+ 214 Acheteurs</p>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/guidance_time.svg" alt="guidance_time" class="img-fluid guidance-time">
                        <span class="offer-hrs">274h 57mn 32</span>
                    </div>
                </div>

                <div class="d-flex position-absolute verified-bx">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verify.svg" alt="verified" class="img-fluid verify-icon">
                    <span>Verified</span>
                </div>
                <div class="position-absolute d-flex align-items-center left-tags">
                    <span class="gift">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/gift.svg" alt="vector1">
                    </span>
                    <a href="#" class="popular-gift">Popular Gift</a>
                </div>
            </div> -->

            <!-- <div class="item position-relative">
                <img src="<?php echo get_template_directory_uri(); ?>/images/deal-img3.webp" class="d-block img-fluid deal-images" alt="Slide 3">
                <div class="offer-content">
                    <p class="offer-para">Double room with small bedroom labranda rose</p>
                    <div class="d-flex justify-content-between align-items-center pricing-bxx">
                        <p class="mb-0">
                            <strong class="text-decoration-line-through old-price">3492 Dh </strong>
                            <span class="new-price">2200 Dh</span>
                        </p>
                        <p class="mb-0 acheteurs">+ 214 Acheteurs</p>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/guidance_time.svg" alt="guidance_time" class="img-fluid guidance-time">
                        <span class="offer-hrs">274h 57mn 32</span>
                    </div>
                </div>

                <div class="d-flex position-absolute verified-bx">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verify.svg" alt="verified" class="img-fluid verify-icon">
                    <span>Verified</span>
                </div>
                <div class="position-absolute d-flex align-items-center left-tags">
                    <span class="primium">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/primium.svg" alt="vector1">
                    </span>
                    <a href="#" class="besion-primium">Besoin Premimum</a>
                </div>
            </div> -->

            <!-- <div class="item position-relative">
                <img src="<?php echo get_template_directory_uri(); ?>/images/deal-img1.webp" class="d-block img-fluid deal-images" alt="Slide 1">
                <div class="offer-content">
                    <h4 class="offer-head">3 Nuits en BB - Palais Zahia</h4>
                    <p class="offer-para1">Chambre royal en 3 nuites avec petit dejeneur au
                        coeur de la ancienne medina de tanger .....</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <strong class="text-decoration-line-through old-price">3492 Dh </strong>
                            <span class="new-price">2200 Dh</span>
                        </p>
                        <p class="mb-0 acheteurs">+ 214 Acheteurs</p>
                    </div>
                    <div class="d-flex align-items-center mt-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/guidance_time.svg" alt="guidance_time" class="img-fluid guidance-time">
                        <span class="offer-hrs">274h 57mn 32</span>
                    </div>
                </div>

                <div class="d-flex position-absolute verified-bx">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verify.svg" alt="verified" class="img-fluid verify-icon">
                    <span>Verified</span>
                </div>
                <div class="position-absolute d-flex align-items-center left-tags">
                    <span class="vector1">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/vector1.svg" alt="vector1">
                    </span>
                    <a href="#" class="book-online">Book Online</a>
                </div>
            </div> -->

        </div>
        <button class="carousel-control-prev offer-prev" type="button">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next offer-next" type="button">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</section>

<section class="main-sections">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h2 class="main-head">Meilleurs Produits & Services</h2>
            </div>
            <div class="col-md-3 text-end">
                <a href="#" class="d-inline-block view-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/view-icon.svg" alt="Filter">
                </a>
            </div>
        </div>
        <!-- Carousel Container -->
        <div id="carouselServices" class="owl-carousel offer-spacing ps-main-section">
            <?php
            if (function_exists('besoin_api_fetch_data')) {
                $productsAndServices = productAndServices();
                if (!empty($productsAndServices)) {
                    foreach ($productsAndServices as $key => $service) { ?>
                        <div class="item ps-box">
                            <?php
                            if (!empty($service['image'])) {
                            ?>
                                <img src="<?= besonAppLink() . '/' . besonImgPath() . 'images/' . $service['image'] ?>" class="d-block img-fluid ps-image" alt="Slide <?= $key ?>">
                            <?php
                            } else {
                            ?>
                                <img src="<?= besonAppLink() . '/' . besonImgPath() . '/image.png' ?>" class="d-block img-fluid ps-image" alt="Slide <?= $key ?>">
                            <?php
                            }
                            ?>
                            <div class="ps-content">
                                <p class="ps-para"><?= $service['title'] ?></p>
                                <p class="ps-price"><?= $service['choose_price'] ?> - <?= $service['price'] ?> DHs</p>
                                <h4 class="ps-head"><?= $service['category_name'] ?></h4>
                                <div class="d-flex justify-content-between align-items-center mx-4">
                                    <?php if ($service['date_of_creation'] > 0) { ?>
                                        <h4 class="ps-year"><?= $service['date_of_creation']; ?> yrs</h4>
                                    <?php } ?>
                                    <div class="d-flex align-items-center pv-bx">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="verified icon" class="me-2">
                                        <p class="mb-0">Verified</p>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>


            <!-- <div class="item ps-box">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ps2.webp" class="d-block img-fluid ps-image" alt="Slide 2">
                <div class="ps-content">
                    <p class="ps-para">Impression de Cartes de visite</p>
                    <p class="ps-price">360.00 - 750.00 DHs</p>
                    <h4 class="ps-head">Shenzhen Enxiao Techbology Co..</h4>
                    <div class="d-flex justify-content-between align-items-center mx-4">
                        <h4 class="ps-year">11 yrs</h4>
                        <div class="d-flex align-items-center pv-bx">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="verified icon" class="me-2">
                            <p class="mb-0">Verified</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item ps-box">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ps3.webp" class="d-block img-fluid ps-image" alt="Slide 3">
                <div class="ps-content">
                    <p class="ps-para">Impression de Cartes de visite</p>
                    <p class="ps-price">360.00 - 750.00 DHs</p>
                    <h4 class="ps-head">Shenzhen Enxiao Techbology Co..</h4>
                    <div class="d-flex justify-content-between align-items-center mx-4">
                        <h4 class="ps-year">11 yrs</h4>
                        <div class="d-flex align-items-center pv-bx">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="verified icon" class="me-2">
                            <p class="mb-0">Verified</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item ps-box">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ps4.webp" class="d-block img-fluid ps-image" alt="Slide 3">
                <div class="ps-content">
                    <p class="ps-para">Impression de Cartes de visite</p>
                    <p class="ps-price">360.00 - 750.00 DHs</p>
                    <h4 class="ps-head">Shenzhen Enxiao Techbology Co..</h4>
                    <div class="d-flex justify-content-between align-items-center mx-4">
                        <h4 class="ps-year">11 yrs</h4>
                        <div class="d-flex align-items-center pv-bx">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="verified icon" class="me-2">
                            <p class="mb-0">Verified</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <button class="carousel-control-prev ps-prev" type="button">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next ps-next" type="button">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</section>

<section class="main-sections">
    <div class="container position-relative">
        <h2 class="main-head text-center">Catégories Populaires</h2>
        <!-- Carousel Container -->
        <div id="carouselCategories" class="owl-carousel offer-spacing ps-main-section">
            <?php
            if (function_exists('besoin_api_fetch_data')) {
                $parentCategories = parentCategories();
                foreach ($parentCategories as $category) {
            ?>
                    <div class="item cat-box d-flex align-items-center">
                        <div class="cat-image-box">
                            <!-- '/public/img/ to /img/icons  -->
                            <img src="<?= besonAppLink() . '/img/icons/' . $category->icon ?>" alt="Slide 1">
                        </div>
                        <p class="cat-para"><?= $category->name; ?></p>
                    </div>
            <?php
                }
            }
            ?>
            <!-- <div class="item cat-box d-flex align-items-center">
                <div class="cat-image-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/cat1.webp" class="d-block img-fluid cat-image" alt="Slide 1">
                </div>
                <p class="cat-para">Services <br> aux <br>entreprises</p>
            </div>

            <div class="item cat-box d-flex align-items-center">
                <div class="cat-image-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/cat2.webp" class="d-block img-fluid cat-image" alt="Slide 2">
                </div>
                <p class="cat-para">Agroalimentaire</p>
            </div>

            <div class="item cat-box d-flex align-items-center">
                <div class="cat-image-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/cat3.webp" class="d-block img-fluid cat-image" alt="Slide 3">
                </div>
                <p class="cat-para">Transports <br> et logistique</p>
            </div>
            <div class="item cat-box d-flex align-items-center">
                <div class="cat-image-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/cat4.webp" class="d-block img-fluid cat-image" alt="Slide 3">
                </div>
                <p class="cat-para">Produits <br> minéraux</p>
            </div> -->
        </div>

        <button class="carousel-control-prev cat-prev" type="button">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next cat-next" type="button">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</section>

<section class="main-sections">
    <div class="container">
        <div class="call-section">
            <h2 class="call-head">Besoin d’un service ? Trouvez l’offre parfaite en un clic !</h2>
            <p class="call-para">Gagnez du temps : trouvez facilement le partenaire qu'il vous faut</p>
            <div class="call-btn-bx">
                <a href="#" class="d-inline-block post-project-btn">
                    Post a project
                </a>
                <p class="or-text">or</p>
                <a href="#" class="d-inline-block search-for-provider-btn">
                    Search for providers
                </a>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>