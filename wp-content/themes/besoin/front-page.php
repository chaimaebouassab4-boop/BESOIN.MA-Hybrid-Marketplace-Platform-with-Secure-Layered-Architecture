<?php
/**
 * Template Name: Homepage
 * 
 * @package BESOIN
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content">
                <h1 class="hero-title">
                    Trouvez tout ce dont vous avez <span class="highlight-orange">besoin</span> au <span class="highlight-blue">Maroc</span>
                </h1>
                <p class="hero-subtitle">
                    Services, emplois, et opportunités business. La marketplace qui connecte les professionnels et les clients partout au Maroc.
                </p>
                
                <!-- Mobile Search (visible only on mobile) -->
                <div class="d-lg-none mb-4">
                    <form action="<?php echo esc_url(home_url('/recherche')); ?>" method="get" class="besoin-search-bar d-flex flex-column">
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

                <div class="d-flex flex-wrap gap-3">
                    <a href="<?php echo esc_url(home_url('/recherche?type=service')); ?>" class="btn btn-danger btn-lg">
                        <i class="bi bi-briefcase me-2"></i>Explorer les services
                    </a>
                    <a href="<?php echo esc_url(home_url('/add-business')); ?>" class="btn btn-outline-orange btn-lg">
                        <i class="bi bi-plus-circle me-2"></i>Publier une annonce
                    </a>
                </div>

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
            
            <div class="col-lg-6 d-none d-lg-block">
                <div class="position-relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/hero-illustration.svg" 
                         alt="BESOIN Marketplace" 
                         class="img-fluid"
                         style="filter: drop-shadow(0 20px 40px rgba(0,0,0,0.1));">
                    
                    <!-- Floating Cards -->
                    <div class="position-absolute top-0 start-0 bg-white p-3 rounded-4 shadow-lg" style="animation: float 3s ease-in-out infinite;">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-success rounded-circle p-2 text-white">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Service réservé</small>
                                <strong>Plombier Casablanca</strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="position-absolute bottom-0 end-0 bg-white p-3 rounded-4 shadow-lg" style="animation: float 3s ease-in-out infinite 1s;">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-primary rounded-circle p-2 text-white">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Nouveau job</small>
                                <strong>Développeur Web</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Explorez par catégorie</h2>
            <p class="text-muted">Trouvez rapidement ce que vous cherchez</p>
        </div>
        
        <div class="row g-4">
            <?php
            $categories = [
                ['icon' => 'bi-house-door', 'name' => 'Immobilier', 'count' => '2,450', 'color' => 'orange'],
                ['icon' => 'bi-car-front', 'name' => 'Automobile', 'count' => '1,890', 'color' => 'blue'],
                ['icon' => 'bi-laptop', 'name' => 'Informatique', 'count' => '3,200', 'color' => 'orange'],
                ['icon' => 'bi-palette', 'name' => 'Design & Créatif', 'count' => '980', 'color' => 'blue'],
                ['icon' => 'bi-tools', 'name' => 'Bricolage', 'count' => '1,560', 'color' => 'orange'],
                ['icon' => 'bi-heart-pulse', 'name' => 'Santé & Bien-être', 'count' => '750', 'color' => 'blue'],
                ['icon' => 'bi-graduation-cap', 'name' => 'Cours & Formation', 'count' => '1,200', 'color' => 'orange'],
                ['icon' => 'bi-briefcase', 'name' => 'Emploi', 'count' => '890', 'color' => 'blue'],
            ];
            
            foreach ($categories as $cat) : 
                $gradient = $cat['color'] === 'orange' 
                    ? 'linear-gradient(135deg, var(--besoin-orange), var(--besoin-orange-light))'
                    : 'linear-gradient(135deg, var(--besoin-blue), var(--besoin-blue-light))';
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="<?php echo esc_url(home_url('/categorie/' . sanitize_title($cat['name']))); ?>" class="text-decoration-none">
                    <div class="category-card">
                        <div class="category-icon" style="background: <?php echo $gradient; ?>">
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

<!-- Featured Listings -->
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
            // Exemple de données - Remplacer par requête WP_Query
            $listings = [
                [
                    'title' => 'Développeur Full Stack React/Laravel',
                    'category' => 'Informatique',
                    'location' => 'Casablanca',
                    'price' => '15 000 - 25 000 DH',
                    'image' => 'dev.jpg',
                    'badge' => 'Urgent',
                    'rating' => 4.8
                ],
                [
                    'title' => 'Coaching Fitness Personnel',
                    'category' => 'Santé',
                    'location' => 'Rabat',
                    'price' => '300 DH/séance',
                    'image' => 'fitness.jpg',
                    'badge' => 'Populaire',
                    'rating' => 5.0
                ],
                [
                    'title' => 'Consultant Marketing Digital',
                    'category' => 'Business',
                    'location' => 'Marrakech',
                    'price' => 'Sur devis',
                    'image' => 'marketing.jpg',
                    'badge' => 'Nouveau',
                    'rating' => 4.5
                ],
                [
                    'title' => 'Architecte d\'intérieur',
                    'category' => 'Design',
                    'location' => 'Tanger',
                    'price' => 'À partir de 5000 DH',
                    'image' => 'design.jpg',
                    'badge' => 'Vérifié',
                    'rating' => 4.9
                ]
            ];
            
            foreach ($listings as $listing) : ?>
            <div class="col-md-6 col-lg-3">
                <div class="listing-card">
                    <div class="listing-image">
                        <div class="skeleton w-100 h-100"></div>
                        <span class="listing-badge"><?php echo $listing['badge']; ?></span>
                        <button class="listing-favorite">
                            <i class="bi bi-heart"></i>
                        </button>
                    </div>
                    <div class="listing-content">
                        <span class="listing-category"><?php echo $listing['category']; ?></span>
                        <h3 class="listing-title"><?php echo $listing['title']; ?></h3>
                        <p class="listing-location">
                            <i class="bi bi-geo-alt me-1"></i><?php echo $listing['location']; ?>
                        </p>
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

<!-- How It Works -->
<section class="how-it-works">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-white">Comment ça marche ?</h2>
            <p class="text-white-50">Trouvez ou proposez des services en 3 étapes simples</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3>Recherchez</h3>
                    <p>Parcourez des milliers d'annonces par catégorie, localisation ou mots-clés. Filtres avancés pour trouver l'expert parfait.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3>Contactez</h3>
                    <p>Discutez directement avec les professionnels. Comparez les offres et choisissez celui qui correspond à vos besoins.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3>Collaborerez</h3>
                    <p>Finalisez votre accord et travaillez ensemble. Laissez un avis pour aider la communauté BESOIN.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
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

<!-- Trust Badges -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center justify-content-center g-4">
            <div class="col-6 col-md-3 text-center">
                <i class="bi bi-shield-check text-primary fs-1"></i>
                <p class="mb-0 mt-2 fw-semibold">Paiement sécurisé</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <i class="bi bi-patch-check text-primary fs-1"></i>
                <p class="mb-0 mt-2 fw-semibold">Profils vérifiés</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <i class="bi bi-headset text-primary fs-1"></i>
                <p class="mb-0 mt-2 fw-semibold">Support 24/7</p>
            </div>
            <div class="col-6 col-md-3 text-center">
                <i class="bi bi-star text-primary fs-1"></i>
                <p class="mb-0 mt-2 fw-semibold">Avis authentiques</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>