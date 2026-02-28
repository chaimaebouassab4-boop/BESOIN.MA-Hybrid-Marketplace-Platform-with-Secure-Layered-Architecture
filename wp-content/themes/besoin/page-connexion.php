<?php
/**
 * Template Name: Connexion
 */
get_header();

$laravel_base = 'http://besoin-api.test'; // ✅ adapte si besoin
$laravel_login_url    = $laravel_base . '/login';
$laravel_register_url = $laravel_base . '/register';
?>

<style>
  .auth-wrap{padding:56px 0;background:linear-gradient(180deg,#f7f8ff 0%,#ffffff 45%);}
  .auth-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:22px;align-items:start}
  @media (max-width: 992px){.auth-grid{grid-template-columns:1fr}}
  .auth-card{background:#fff;border:1px solid #eef0f7;border-radius:18px;box-shadow:0 18px 40px rgba(16,24,40,.08);padding:22px}
  .auth-title{font-size:44px;line-height:1.05;margin:0 0 10px;font-weight:900;color:#0f1b3d}
  .auth-sub{color:#667085;margin:0 0 18px}
  .auth-label{font-weight:700;color:#101828;margin-bottom:6px}
  .auth-input{height:48px;border-radius:12px;border:1px solid #e5e7eb;padding:10px 14px;width:100%}
  .auth-input:focus{outline:none;border-color:#d05a2f;box-shadow:0 0 0 3px rgba(208,90,47,.15)}
  .auth-row{margin-bottom:14px}
  .auth-actions{display:flex;justify-content:space-between;gap:10px;align-items:center;margin:10px 0 16px}
  .auth-link{color:#1d4ed8;text-decoration:none;font-weight:600}
  .auth-link:hover{text-decoration:underline}
  .btn-auth{display:flex;gap:10px;justify-content:center;align-items:center;height:52px;border-radius:999px;border:0;width:100%;
    background:#d05a2f;color:#fff;font-weight:800;font-size:16px;box-shadow:0 14px 28px rgba(208,90,47,.25)}
  .btn-auth:hover{filter:brightness(.98)}
  .side-card{background:linear-gradient(180deg,#0f1b3d 0%,#132a66 100%);color:#fff;border-radius:18px;padding:22px;box-shadow:0 18px 40px rgba(16,24,40,.10)}
  .side-title{font-size:22px;font-weight:900;margin:0 0 10px}
  .side-list{margin:0;padding-left:18px;opacity:.95}
  .side-list li{margin:8px 0}
  .btn-outline-auth{display:inline-flex;justify-content:center;align-items:center;height:46px;border-radius:999px;padding:0 16px;
    border:2px solid rgba(255,255,255,.35);color:#fff;text-decoration:none;font-weight:800}
  .btn-outline-auth:hover{border-color:rgba(255,255,255,.55)}
  .muted-note{font-size:13px;opacity:.85;margin-top:12px}
</style>

<section class="auth-wrap">
  <div class="container">

    <div class="auth-grid">
      <!-- LEFT: LOGIN -->
      <div class="auth-card">
        <h1 class="auth-title">Connexion</h1>
        <p class="auth-sub">Connecte-toi pour accéder à ton espace et gérer tes annonces.</p>

        <form method="post" action="<?php echo esc_url($laravel_login_url); ?>">
          <div class="auth-row">
            <div class="auth-label">Email</div>
            <input type="email" name="email" class="auth-input" placeholder="ex: nom@email.com" required>
          </div>

          <div class="auth-row">
            <div class="auth-label">Mot de passe</div>
            <input type="password" name="password" class="auth-input" placeholder="••••••••" required>
          </div>

          <div class="auth-actions">
            <label style="display:flex;align-items:center;gap:8px;color:#475467;font-weight:600;">
              <input type="checkbox" name="remember" value="1">
              Se souvenir de moi
            </label>

            <a class="auth-link" href="<?php echo esc_url($laravel_base . '/forgot-password'); ?>">
              Mot de passe oublié ?
            </a>
          </div>

          <button class="btn-auth" type="submit">
            <i class="bi bi-box-arrow-in-right"></i> Se connecter
          </button>

          <div class="muted-note">
            En te connectant, tu acceptes nos conditions et notre politique de confidentialité.
          </div>
        </form>
      </div>

      <!-- RIGHT: REGISTER INFO -->
      <div class="side-card">
        <div class="side-title">Pas encore de compte ?</div>
        <p style="opacity:.92;margin:0 0 12px;">
          Crée un compte en 1 minute et profite de BESOIN.MA :
        </p>
        <ul class="side-list">
          <li>Publier des annonces (produits, services, business)</li>
          <li>Gérer ton profil et tes coordonnées</li>
          <li>Recevoir des demandes clients plus facilement</li>
        </ul>

        <div style="margin-top:16px;">
          <a class="btn-outline-auth" href="<?php echo esc_url($laravel_register_url); ?>">
            Créer un compte
          </a>
        </div>

        <div class="muted-note">
          Tu seras redirigé vers le formulaire d’inscription sécurisé.
        </div>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>