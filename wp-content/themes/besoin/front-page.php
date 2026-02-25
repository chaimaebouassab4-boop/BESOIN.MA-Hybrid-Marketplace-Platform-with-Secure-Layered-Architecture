<?php
/**
 * Template Name: Homepage
 * @package BESOIN
 */

get_header();

// Businesses locaux pour le carrousel hero
$hero_businesses = [
    ['name' => 'Zen Ghazala', 'category' => 'Salon de Beauté & Spa', 'location' => 'Casablanca', 'color' => '#FF4D00'],
    ['name' => 'TechPro Maroc', 'category' => 'Informatique & Réseaux', 'location' => 'Rabat', 'color' => '#0066FF'],
    ['name' => 'Casa Immobilier', 'category' => 'Agence Immobilière', 'location' => 'Casablanca', 'color' => '#FF4D00'],
    ['name' => 'FitLife Gym', 'category' => 'Fitness & Bien-être', 'location' => 'Marrakech', 'color' => '#0066FF'],
    ['name' => 'Chez Mohamed', 'category' => 'Restaurant Traditionnel', 'location' => 'Fès', 'color' => '#FF4D00'],
    ['name' => 'AutoService Plus', 'category' => 'Garage Automobile', 'location' => 'Tanger', 'color' => '#0066FF'],
];
?>

<!-- ══════════════════════════════════════
     HERO SECTION
══════════════════════════════════════ -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-hero">

            <!-- LEFT: Texte + CTA -->
            <div class="col-lg-5 hero-content">
                <h1 class="hero-title">
                    Trouvez tout ce dont vous avez
                    <span class="highlight-orange">besoin</span> au
                    <span class="highlight-blue">Maroc</span>
                </h1>
                <p class="hero-subtitle">
                    Services, emplois, et opportunités business. La marketplace qui connecte les professionnels et les clients partout au Maroc.
                </p>

                <!-- Mobile Search -->
                <div class="d-lg-none mb-4">
                    <form action="<?php echo esc_url(home_url('/recherche')); ?>" method="get" class="mobile-search">
                        <input type="search" name="q" class="form-control mb-2" placeholder="Que recherchez-vous ?">
                        <select name="location" class="form-select mb-2">
                            <option value="">Tout le Maroc</option>
                            <option value="casablanca">Casablanca</option>
                            <option value="rabat">Rabat</option>
                            <option value="marrakech">Marrakech</option>
                        </select>
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-search"></i> Rechercher
                        </button>
                    </form>
                </div>

                <!-- CTA Buttons -->
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="<?php echo esc_url(home_url('/recherche?type=service')); ?>" class="btn besoin-btn-orange btn-lg">
                        <i class="bi bi-briefcase me-2"></i>Explorer les services
                    </a>
                    <a href="<?php echo esc_url(home_url('/add-business')); ?>" class="btn besoin-btn-outline btn-lg">
                        <i class="bi bi-plus-circle me-2"></i>Publier une annonce
                    </a>
                </div>

                <!-- Stats -->
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">15K+</span>
                        <span class="stat-label">Services</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">8K+</span>
                        <span class="stat-label">Entreprises</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">50K+</span>
                        <span class="stat-label">Utilisateurs</span>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Carrousel businesses -->
            <div class="col-lg-7 d-none d-lg-block hero-carousel-col">
                <div class="hero-carousel-wrapper">

                    <!-- Colonne gauche (défile vers le bas) -->
                    <div class="biz-column biz-column-left">
                        <?php
                        // Répète 3x pour boucle infinie fluide
                        for ($r = 0; $r < 3; $r++) :
                            foreach ($hero_businesses as $i => $biz) :
                                if ($i % 2 === 0) : // indices pairs = colonne gauche
                        ?>
                        <div class="biz-card">
                            <div class="biz-icon" style="background: <?php echo $biz['color']; ?>20; color: <?php echo $biz['color']; ?>;">
                                <i class="bi bi-building"></i>
                            </div>
                            <div class="biz-info">
                                <span class="biz-category"><?php echo esc_html($biz['category']); ?></span>
                                <strong class="biz-name"><?php echo esc_html($biz['name']); ?></strong>
                                <span class="biz-location">
                                    <i class="bi bi-geo-alt"></i> <?php echo esc_html($biz['location']); ?>
                                </span>
                            </div>
                            <div class="biz-badge" style="background: <?php echo $biz['color']; ?>15; color: <?php echo $biz['color']; ?>;">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                        </div>
                        <?php endif; endforeach; endfor; ?>
                    </div>

                    <!-- Colonne droite (défile vers le haut) -->
                    <div class="biz-column biz-column-right">
                        <?php
                        for ($r = 0; $r < 3; $r++) :
                            foreach ($hero_businesses as $i => $biz) :
                                if ($i % 2 !== 0) : // indices impairs = colonne droite
                        ?>
                        <div class="biz-card">
                            <div class="biz-icon" style="background: <?php echo $biz['color']; ?>20; color: <?php echo $biz['color']; ?>;">
                                <i class="bi bi-shop"></i>
                            </div>
                            <div class="biz-info">
                                <span class="biz-category"><?php echo esc_html($biz['category']); ?></span>
                                <strong class="biz-name"><?php echo esc_html($biz['name']); ?></strong>
                                <span class="biz-location">
                                    <i class="bi bi-geo-alt"></i> <?php echo esc_html($biz['location']); ?>
                                </span>
                            </div>
                            <div class="biz-badge" style="background: <?php echo $biz['color']; ?>15; color: <?php echo $biz['color']; ?>;">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                        </div>
                        <?php endif; endforeach; endfor; ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- ══════════════════════════════════════
     CATEGORIES SECTION
══════════════════════════════════════ -->
<section class="categories-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Explorez par catégorie</h2>
            <p class="text-muted">Trouvez rapidement ce que vous cherchez</p>
        </div>
        <div class="row g-4">
            <?php
            $categories = [
                ['icon' => 'bi-house-door',    'name' => 'Immobilier',       'count' => '2 450', 'color' => 'orange'],
                ['icon' => 'bi-car-front',      'name' => 'Automobile',       'count' => '1 890', 'color' => 'blue'],
                ['icon' => 'bi-laptop',         'name' => 'Informatique',     'count' => '3 200', 'color' => 'orange'],
                ['icon' => 'bi-palette',        'name' => 'Design & Créatif', 'count' => '980',   'color' => 'blue'],
                ['icon' => 'bi-tools',          'name' => 'Bricolage',        'count' => '1 560', 'color' => 'orange'],
                ['icon' => 'bi-heart-pulse',    'name' => 'Santé & Bien-être','count' => '750',   'color' => 'blue'],
                ['icon' => 'bi-graduation-cap', 'name' => 'Formation',        'count' => '1 200', 'color' => 'orange'],
                ['icon' => 'bi-briefcase',      'name' => 'Emploi',           'count' => '890',   'color' => 'blue'],
            ];
            foreach ($categories as $cat) :
                $bg = $cat['color'] === 'orange' ? '#FF4D00' : '#0066FF';
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="<?php echo esc_url(home_url('/categorie/' . sanitize_title($cat['name']))); ?>" class="text-decoration-none">
                    <div class="category-card">
                        <div class="category-icon" style="background: <?php echo $bg; ?>;">
                            <i class="bi <?php echo $cat['icon']; ?>"></i>
                        </div>
                        <h3><?php echo $cat['name']; ?></h3>
                        <p><?php echo $cat['count']; ?> annonces</p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════
     FEATURED LISTINGS
══════════════════════════════════════ -->
<section class="listings-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
            <div>
                <h2 class="section-title mb-0">Annonces en vedette</h2>
                <p class="text-muted mb-0">Les meilleures opportunités sélectionnées pour vous</p>
            </div>
            <a href="<?php echo esc_url(home_url('/recherche')); ?>" class="btn btn-outline-primary">
                Voir tout <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
        <div class="row g-4">
            <?php
            $listings = [
                ['title' => 'Développeur Full Stack React/Laravel', 'category' => 'Informatique', 'location' => 'Casablanca', 'price' => '15 000 - 25 000 DH', 'badge' => 'Urgent',   'rating' => 4.8],
                ['title' => 'Coaching Fitness Personnel',           'category' => 'Santé',        'location' => 'Rabat',       'price' => '300 DH/séance',      'badge' => 'Populaire','rating' => 5.0],
                ['title' => 'Consultant Marketing Digital',         'category' => 'Business',     'location' => 'Marrakech',   'price' => 'Sur devis',          'badge' => 'Nouveau',  'rating' => 4.5],
                ['title' => 'Architecte d\'intérieur',              'category' => 'Design',       'location' => 'Tanger',      'price' => 'À partir de 5000 DH','badge' => 'Vérifié',  'rating' => 4.9],
            ];
            foreach ($listings as $listing) : ?>
            <div class="col-md-6 col-lg-3">
                <div class="listing-card">
                    <div class="listing-image">
                        <div class="listing-img-placeholder"></div>
                        <span class="listing-badge"><?php echo $listing['badge']; ?></span>
                        <button class="listing-favorite"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="listing-content">
                        <span class="listing-category"><?php echo $listing['category']; ?></span>
                        <h3 class="listing-title"><?php echo $listing['title']; ?></h3>
                        <p class="listing-location"><i class="bi bi-geo-alt me-1"></i><?php echo $listing['location']; ?></p>
                        <div class="listing-footer">
                            <span class="listing-price"><?php echo $listing['price']; ?></span>
                            <div class="listing-rating">
                                <i class="bi bi-star-fill"></i>
                                <span><?php echo $listing['rating']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════
     HOW IT WORKS
══════════════════════════════════════ -->
<section class="how-it-works">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-white">Comment ça marche ?</h2>
            <p class="text-white-50">Trouvez ou proposez des services en 3 étapes simples</p>
        </div>
        <div class="row g-4">
            <?php
            $steps = [
                ['num' => '1', 'title' => 'Recherchez',  'text' => 'Parcourez des milliers d\'annonces par catégorie, localisation ou mots-clés.'],
                ['num' => '2', 'title' => 'Contactez',   'text' => 'Discutez directement avec les professionnels et comparez les offres.'],
                ['num' => '3', 'title' => 'Collaborez',  'text' => 'Finalisez votre accord et laissez un avis pour aider la communauté.'],
            ];
            foreach ($steps as $step) : ?>
            <div class="col-md-4">
                <div class="step-card">
                    <div class="step-number"><?php echo $step['num']; ?></div>
                    <h3><?php echo $step['title']; ?></h3>
                    <p><?php echo $step['text']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════
     CTA
══════════════════════════════════════ -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Prêt à développer votre business ?</h2>
            <p>Rejoignez des milliers de professionnels qui trouvent des clients sur BESOIN.MA</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="<?php echo esc_url(home_url('/inscription')); ?>" class="btn btn-white btn-lg">
                    Créer un compte gratuit
                </a>
                <a href="<?php echo esc_url(home_url('/tarifs')); ?>" class="btn btn-outline-light btn-lg">
                    Voir les tarifs
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════
     TRUST BADGES
══════════════════════════════════════ -->
<section class="trust-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center justify-content-center g-4">
            <?php
            $badges = [
                ['icon' => 'bi-shield-check', 'label' => 'Paiement sécurisé'],
                ['icon' => 'bi-patch-check',  'label' => 'Profils vérifiés'],
                ['icon' => 'bi-headset',      'label' => 'Support 24/7'],
                ['icon' => 'bi-star',         'label' => 'Avis authentiques'],
            ];
            foreach ($badges as $badge) : ?>
            <div class="col-6 col-md-3 text-center">
                <i class="bi <?php echo $badge['icon']; ?> text-primary fs-1"></i>
                <p class="mb-0 mt-2 fw-semibold"><?php echo $badge['label']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>