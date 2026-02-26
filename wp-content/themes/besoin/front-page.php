<?php
/**
 * Template Name: Homepage
 * @package BESOIN
 */

get_header();

// type par défaut depuis URL ou fallback
$default_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : 'service';

// Sécurité : on force uniquement les valeurs attendues
$allowed_types = ['service', 'emploi', 'business'];
if (!in_array($default_type, $allowed_types, true)) {
  $default_type = 'service';
}

// liens utiles
$search_url = esc_url(home_url('/recherche'));
$publish_url = esc_url(home_url('/add-business')); // adapte si ton URL est différente
$person_url = esc_url(get_template_directory_uri() . '/images/hero-person.png');
?>

<!-- ══════════════════════════════════════
     HERO SECTION
══════════════════════════════════════ -->
<section class="hero-section hero-modern">
  <div class="container">
    <div class="row align-items-start min-vh-hero g-5">

      <!-- LEFT: Texte + Tabs + Search Mobile + CTA + Stats -->
      <div class="col-lg-5 hero-content">

        <h1 class="hero-title">
          Trouvez tout ce dont vous avez
          <span class="highlight-orange">besoin</span> au
          <span class="highlight-blue">Maroc</span>
        </h1>

        <p class="hero-subtitle">
          Services, emplois et opportunités business. La marketplace qui connecte
          les professionnels et les clients partout au Maroc.
        </p>

        <!-- Tabs: Services | Emplois | Business -->
        <ul class="nav nav-pills hero-tabs mb-3" id="heroTypeTabs" role="tablist" aria-label="Type de recherche">
          <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $default_type === 'service' ? 'active' : ''; ?>"
                    type="button" data-type="service">
              Services
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $default_type === 'emploi' ? 'active' : ''; ?>"
                    type="button" data-type="emploi">
              Emplois
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $default_type === 'business' ? 'active' : ''; ?>"
                    type="button" data-type="business">
              Business
            </button>
          </li>
        </ul>

        <!-- Mobile Search (envoie aussi type) -->
        <div class="d-lg-none mb-4">
          <form action="<?php echo $search_url; ?>" method="get" class="mobile-search">
            <input type="hidden" name="type" id="heroSearchTypeMobile" value="<?php echo esc_attr($default_type); ?>">

            <input type="search" name="q" class="form-control mb-2" placeholder="Que recherchez-vous ?">
            <select name="location" class="form-select mb-2">
              <option value="">Tout le Maroc</option>
              <option value="casablanca">Casablanca</option>
              <option value="rabat">Rabat</option>
              <option value="marrakech">Marrakech</option>
            </select>
            <button type="submit" class="btn besoin-btn-orange w-100">
              <i class="bi bi-search me-1"></i> Rechercher
            </button>
          </form>
        </div>

        <!-- CTA Buttons (Explorer dynamique selon tab) -->
        <div class="d-flex flex-wrap gap-3 mb-5">
          <a id="heroExploreLink"
             href="<?php echo esc_url(home_url('/recherche?type=' . $default_type)); ?>"
             class="btn besoin-btn-orange btn-lg">
            <i class="bi bi-briefcase me-2"></i>
            <span id="heroExploreLabel">
              <?php
                echo $default_type === 'emploi' ? 'Explorer les emplois' :
                     ($default_type === 'business' ? 'Explorer le business' : 'Explorer les services');
              ?>
            </span>
          </a>

          <a href="<?php echo $publish_url; ?>" class="btn besoin-btn-outline btn-lg">
            <i class="bi bi-plus-circle me-2"></i>Publier une annonce
          </a>
        </div>

        <!-- Stats -->
        <div class="hero-stats">
          <div class="stat-item">
            <span class="stat-number">15K+</span>
            <span class="stat-label">Services</span>
          </div>
          <div class="stat-divider"></div>
          <div class="stat-item">
            <span class="stat-number">8K+</span>
            <span class="stat-label">Entreprises</span>
          </div>
          <div class="stat-divider"></div>
          <div class="stat-item">
            <span class="stat-number">50K+</span>
            <span class="stat-label">Utilisateurs</span>
          </div>
        </div>

      </div>

      <!-- RIGHT: Visual zone (desktop only) -->
      <div class="col-lg-7 hero-visual-col d-none d-lg-flex justify-content-center">
        <div class="hero-visual" style="background-image: url('<?php echo $person_url; ?>');">

          <!-- SVG lignes pointillées -->
          <svg class="hero-dots" viewBox="0 0 620 480" preserveAspectRatio="none" aria-hidden="true">
            <path d="M 130 60 C 200 40, 270 80, 300 170"/>
            <path d="M 490 60 C 430 40, 360 80, 330 170"/>
            <path d="M 310 400 C 310 430, 310 450, 310 460"/>
          </svg>

          <!-- Carte haut gauche -->
          <div class="float-card tone-orange fc-0">
            <div class="float-card-icon">
              <i class="bi bi-briefcase-fill"></i>
            </div>
            <div class="float-card-content">
              <span class="float-badge">Opportunité business</span>
              <h4>Clair s.a.r.l.</h4>
              <p>Hôtels & Voyages • Casablanca</p>
            </div>
          </div>

          <!-- Carte haut droite -->
          <div class="float-card tone-blue fc-1">
            <div class="float-card-icon">
              <i class="bi bi-palette-fill"></i>
            </div>
            <div class="float-card-content">
              <span class="float-badge">Nouveau service</span>
              <h4>Abat jour design</h4>
              <p>Artisanat • Agdal, Rabat</p>
            </div>
          </div>

          <!-- Carte bas centre -->
          <div class="float-card tone-green fc-2">
            <div class="float-card-icon">
              <i class="bi bi-patch-check-fill"></i>
            </div>
            <div class="float-card-content">
              <span class="float-badge">Entreprise vérifiée</span>
              <h4>Zen Restaurant</h4>
              <p>Rabat • Agdal</p>
            </div>
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
        ['icon' => 'bi-house-door',    'name' => 'Immobilier',        'count' => '2 450', 'color' => 'orange'],
        ['icon' => 'bi-car-front',     'name' => 'Automobile',        'count' => '1 890', 'color' => 'blue'],
        ['icon' => 'bi-laptop',        'name' => 'Informatique',      'count' => '3 200', 'color' => 'orange'],
        ['icon' => 'bi-palette',       'name' => 'Design & Créatif',  'count' => '980',   'color' => 'blue'],
        ['icon' => 'bi-tools',         'name' => 'Bricolage',         'count' => '1 560', 'color' => 'orange'],
        ['icon' => 'bi-heart-pulse',   'name' => 'Santé & Bien-être', 'count' => '750',   'color' => 'blue'],
        ['icon' => 'bi-graduation-cap','name' => 'Formation',         'count' => '1 200', 'color' => 'orange'],
        ['icon' => 'bi-briefcase',     'name' => 'Emploi',            'count' => '890',   'color' => 'blue'],
      ];

      foreach ($categories as $cat) :
        $bg = $cat['color'] === 'orange' ? '#FF4D00' : '#0066FF';
      ?>
        <div class="col-6 col-md-4 col-lg-3">
          <a href="<?php echo esc_url(home_url('/categorie/' . sanitize_title($cat['name']))); ?>" class="text-decoration-none">
            <div class="category-card">
              <div class="category-icon" style="background: <?php echo esc_attr($bg); ?>;">
                <i class="bi <?php echo esc_attr($cat['icon']); ?>"></i>
              </div>
              <h3><?php echo esc_html($cat['name']); ?></h3>
              <p><?php echo esc_html($cat['count']); ?> annonces</p>
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
        <p class="text-muted mb-0">Les meilleures offres & opportunités sélectionnées pour vous</p>
      </div>
      <a href="<?php echo esc_url(home_url('/recherche')); ?>" class="btn btn-outline-primary">
        Voir tout <i class="bi bi-arrow-right ms-2"></i>
      </a>
    </div>

    <div class="row g-4">
      <?php
      $listings = [
        ['title' => 'Développeur Full Stack React/Laravel', 'category' => 'Informatique', 'location' => 'Casablanca', 'price' => '15 000 - 25 000 DH', 'badge' => 'Urgent',    'rating' => 4.8],
        ['title' => 'Coaching Fitness Personnel',          'category' => 'Santé',        'location' => 'Rabat',      'price' => '300 DH/séance',      'badge' => 'Populaire', 'rating' => 5.0],
        ['title' => 'Consultant Marketing Digital',        'category' => 'Business',     'location' => 'Marrakech',  'price' => 'Sur devis',          'badge' => 'Nouveau',   'rating' => 4.5],
        ['title' => 'Architecte d\'intérieur',             'category' => 'Design',       'location' => 'Tanger',     'price' => 'À partir de 5000 DH','badge' => 'Vérifié',   'rating' => 4.9],
      ];

      foreach ($listings as $listing) : ?>
        <div class="col-md-6 col-lg-3">
          <div class="listing-card">
            <div class="listing-image">
              <div class="listing-img-placeholder"></div>
              <span class="listing-badge"><?php echo esc_html($listing['badge']); ?></span>
              <button class="listing-favorite" type="button" aria-label="Ajouter aux favoris">
                <i class="bi bi-heart"></i>
              </button>
            </div>
            <div class="listing-content">
              <span class="listing-category"><?php echo esc_html($listing['category']); ?></span>
              <h3 class="listing-title"><?php echo esc_html($listing['title']); ?></h3>
              <p class="listing-location"><i class="bi bi-geo-alt me-1"></i><?php echo esc_html($listing['location']); ?></p>
              <div class="listing-footer">
                <span class="listing-price"><?php echo esc_html($listing['price']); ?></span>
                <div class="listing-rating">
                  <i class="bi bi-star-fill text-warning"></i>
                  <span><?php echo esc_html($listing['rating']); ?></span>
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
        ['num' => '1', 'title' => 'Recherchez', 'text' => 'Parcourez des milliers d\'annonces par catégorie, localisation ou mots-clés.'],
        ['num' => '2', 'title' => 'Contactez',  'text' => 'Discutez directement avec les professionnels et comparez les offres.'],
        ['num' => '3', 'title' => 'Collaborez', 'text' => 'Finalisez votre accord et laissez un avis pour aider la communauté.'],
      ];
      foreach ($steps as $step) : ?>
        <div class="col-md-4">
          <div class="step-card">
            <div class="step-number"><?php echo esc_html($step['num']); ?></div>
            <h3><?php echo esc_html($step['title']); ?></h3>
            <p><?php echo esc_html($step['text']); ?></p>
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
          <i class="bi <?php echo esc_attr($badge['icon']); ?> fs-1" style="color: var(--blue);"></i>
          <p class="mb-0 mt-2 fw-semibold"><?php echo esc_html($badge['label']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- JS : synchronise tabs -> type + explore link + mobile form -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const tabs = document.querySelectorAll('#heroTypeTabs .nav-link');
  const typeMobile = document.getElementById('heroSearchTypeMobile');
  const exploreLink = document.getElementById('heroExploreLink');
  const exploreLabel = document.getElementById('heroExploreLabel');

  function labelFor(type){
    if(type === 'emploi') return 'Explorer les emplois';
    if(type === 'business') return 'Explorer le business';
    return 'Explorer les services';
  }

  function setType(type){
    // mobile hidden input
    if(typeMobile) typeMobile.value = type;

    // explore CTA
    if(exploreLink) exploreLink.href = "<?php echo esc_js(home_url('/recherche?type=')); ?>" + type;
    if(exploreLabel) exploreLabel.textContent = labelFor(type);

    // active classes
    tabs.forEach(b => b.classList.remove('active'));
    const active = document.querySelector('#heroTypeTabs .nav-link[data-type="'+type+'"]');
    if(active) active.classList.add('active');
  }

  tabs.forEach(btn => {
    btn.addEventListener('click', function () {
      setType(this.dataset.type);
    });
  });

  // init on load (PHP default)
  setType("<?php echo esc_js($default_type); ?>");
});
</script>

<?php get_footer(); ?>