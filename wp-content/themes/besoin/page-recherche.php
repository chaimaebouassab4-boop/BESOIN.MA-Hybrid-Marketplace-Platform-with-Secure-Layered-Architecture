<?php
/**
 * Template Name: Recherche
 * @package BESOIN
 */

get_header();

// ── Paramètres GET ──────────────────────────────────────────
$category_id = isset($_GET['category_id']) ? absint($_GET['category_id']) : 0;
$query       = isset($_GET['q']) ? sanitize_text_field($_GET['q']) : '';
$location    = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : '';

// location : on préfère un ID numérique (car business_meta.location = ID)
$location_id = ctype_digit((string)$location) ? absint($location) : 0;

// ── Connexion secondaire à besoin_data ──────────────────────
$db = new wpdb(DB_USER, DB_PASSWORD, 'besoin_ui', DB_HOST);
$db->set_charset($db->dbh, 'utf8mb4');

// ── Nom de la catégorie (si filtre actif) ───────────────────
$category_name = '';
if ($category_id) {
    $category_name = $db->get_var(
        $db->prepare("SELECT name FROM categories WHERE id = %d", $category_id)
    );
}

// ── Construction requête dynamique ───────────────────────────
$where  = ["1=1"];
$params = [];

// ✅ Exclure les données de test (comme "Test11")
$where[] = "LOWER(b.name) NOT LIKE 'test%'";
$where[] = "LOWER(b.name) NOT LIKE '%lorem%'"; // optionnel mais pratique

// filtre catégorie (business_meta: key=category)
if ($category_id) {
    $where[]  = "bm_cat.`value` = %d";
    $params[] = $category_id;
}

// filtre mots-clés
if ($query) {
    $where[]  = "(b.name LIKE %s OR b.address LIKE %s)";
    $like     = '%' . $db->esc_like($query) . '%';
    $params[] = $like;
    $params[] = $like;
}

// filtre location (si ID numérique) (business_meta: key=location)
if ($location_id) {
    $where[]  = "bm_loc.`value` = %d";
    $params[] = $location_id;
}

$where_sql = implode(' AND ', $where);

$sql = "
    SELECT DISTINCT
        b.id, b.name, b.address, b.landmark, b.phone, b.email, b.website,
        (
          SELECT g.value
          FROM galleries g
          WHERE g.post_id = b.id AND g.prefix = 'logo'
          ORDER BY g.id ASC
          LIMIT 1
        ) AS logo_file
    FROM business b
    INNER JOIN business_meta bm_cat
        ON bm_cat.post_id = b.id
       AND bm_cat.`key` = 'category'
    LEFT JOIN business_meta bm_loc
        ON bm_loc.post_id = b.id
       AND bm_loc.`key` = 'location'
    WHERE {$where_sql}
    ORDER BY b.id DESC
    LIMIT 48
";

$results = $params
    ? $db->get_results($db->prepare($sql, ...$params))
    : $db->get_results($sql);

// ── Titre page ──────────────────────────────────────────────
if ($category_name) {
    $page_title = 'Résultats pour : <span class="text-orange">' . esc_html($category_name) . '</span>';
} elseif ($query) {
    $page_title = 'Résultats pour : <span class="text-orange">' . esc_html($query) . '</span>';
} else {
    $page_title = 'Toutes les entreprises';
}
?>

<section class="py-4 bg-light border-bottom">
  <div class="container">

    <form method="get" action="<?php echo esc_url(function_exists('besoin_get_search_page_url') ? besoin_get_search_page_url() : home_url('/recherche/')); ?>" class="row g-2 align-items-center">
      <?php if ($category_id) : ?>
        <input type="hidden" name="category_id" value="<?php echo esc_attr($category_id); ?>">
      <?php endif; ?>

      <div class="col-12 col-md-5">
        <input type="search" name="q" class="form-control"
               placeholder="Que recherchez-vous ?"
               value="<?php echo esc_attr($query); ?>">
      </div>

      <div class="col-12 col-md-3">
        <select name="location" class="form-select">
          <option value="">Tout le Maroc</option>
          <?php
          $villes = [
            '31' => 'Tanger',
            '32' => 'Rabat',
            '39' => 'Casablanca',
          ];
          foreach ($villes as $val => $label) : ?>
            <option value="<?php echo esc_attr($val); ?>" <?php selected((string)$location_id, (string)$val); ?>>
              <?php echo esc_html($label); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-12 col-md-2">
        <button type="submit" class="btn besoin-btn-orange w-100">
          <i class="bi bi-search me-1"></i> Rechercher
        </button>
      </div>

      <?php if ($category_id || $query || $location_id) : ?>
        <div class="col-12 col-md-2">
          <a href="<?php echo esc_url(function_exists('besoin_get_search_page_url') ? besoin_get_search_page_url() : home_url('/recherche/')); ?>" class="btn btn-outline-secondary w-100">
            <i class="bi bi-x-circle me-1"></i> Effacer
          </a>
        </div>
      <?php endif; ?>
    </form>

  </div>
</section>

<section class="py-5">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
      <h2 class="section-title mb-0"><?php echo wp_kses_post($page_title); ?></h2>
      <span class="text-muted">
        <?php echo count($results); ?> entreprise<?php echo count($results) !== 1 ? 's' : ''; ?>
      </span>
    </div>

    <?php if (!empty($results)) : ?>
      <div class="row g-4">
        <?php foreach ($results as $business) : ?>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="listing-card h-100">
              <div class="listing-content">

<?php
  $logo_url = '';
  if (!empty($business->logo_file)) {
    $logo_url = besoin_business_logo_url($business->logo_file);
  }
?>

<div class="listing-img-placeholder mb-3" style="height:120px; border-radius:8px; background:#f0f0f0; overflow:hidden;">
  <?php if ($logo_url) : ?>
    <img
      src="<?php echo esc_url($logo_url); ?>"
      alt="<?php echo esc_attr($business->name); ?>"
      style="width:100%; height:100%; object-fit:contain; display:block;"
      loading="lazy"
      onerror="this.style.display='none';"
    >
  <?php endif; ?>
</div>
                <?php if ($category_name) : ?>
                  <span class="listing-category"><?php echo esc_html($category_name); ?></span>
                <?php endif; ?>

                <h3 class="listing-title mt-1"><?php echo esc_html($business->name); ?></h3>

                <?php if (!empty($business->address)) : ?>
                  <p class="listing-location">
                    <i class="bi bi-geo-alt me-1"></i><?php echo esc_html($business->address); ?>
                  </p>
                <?php endif; ?>

                <div class="listing-footer mt-3">
                  <a href="<?php echo esc_url(home_url('/business/' . $business->id)); ?>" class="btn besoin-btn-orange btn-sm">
                    Voir le profil
                  </a>
                </div>

              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    <?php else : ?>
      <div class="text-center py-5">
        <i class="bi bi-search" style="font-size:3rem; color:#ccc;"></i>
        <h4 class="mt-3 text-muted">Aucune entreprise trouvée</h4>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn besoin-btn-orange mt-3">
          <i class="bi bi-house me-1"></i> Retour à l'accueil
        </a>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>