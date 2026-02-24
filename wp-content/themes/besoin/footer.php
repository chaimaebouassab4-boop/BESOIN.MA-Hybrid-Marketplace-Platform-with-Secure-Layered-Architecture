<?php
/**
 * Footer template
 * 
 * @package BESOIN
 */
?>

    </div><!-- #page -->

    <footer class="main-footer">
        <div class="container">
            <div class="row g-4">
                <!-- Brand Column -->
                <div class="col-lg-4 col-md-6">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-brand text-decoration-none">
                        BESOIN<span>.MA</span>
                    </a>
                    <p class="footer-desc">
                        La premiÃ¨re marketplace marocaine dÃ©diÃ©e aux services, emplois et opportunitÃ©s business. 
                        Connectez-vous avec les meilleurs professionnels du royaume.
                    </p>
                    <div class="social-links">
                        <a href="https://facebook.com/besoin.ma" target="_blank" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://instagram.com/besoin.ma" target="_blank" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://linkedin.com/company/besoin" target="_blank" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="https://twitter.com/besoin_ma" target="_blank" aria-label="Twitter">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    </div>
                </div>

                <!-- Links Columns -->
                <div class="col-lg-2 col-md-6">
                    <h4 class="footer-title">Explorer</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/recherche?type=service')); ?>">Services</a></li>
                        <li><a href="<?php echo esc_url(home_url('/recherche?type=job')); ?>">Emplois</a></li>
                        <li><a href="<?php echo esc_url(home_url('/recherche?type=business')); ?>">Business</a></li>
                        <li><a href="<?php echo esc_url(home_url('/categories')); ?>">CatÃ©gories</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h4 class="footer-title">Entreprise</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/a-propos')); ?>">Ã€ propos</a></li>
                        <li><a href="<?php echo esc_url(home_url('/carrieres')); ?>">CarriÃ¨res</a></li>
                        <li><a href="<?php echo esc_url(home_url('/presse')); ?>">Presse</a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h4 class="footer-title">Aide</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/aide')); ?>">Centre d'aide</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                        <li><a href="<?php echo esc_url(home_url('/confidentialite')); ?>">ConfidentialitÃ©</a></li>
                        <li><a href="<?php echo esc_url(home_url('/cgv')); ?>">CGV</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h4 class="footer-title">Professionnels</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/add-business')); ?>">Publier une annonce</a></li>
                        <li><a href="<?php echo esc_url(home_url('/tarifs')); ?>">Tarifs</a></li>
                        <li><a href="<?php echo esc_url(home_url('/pro')); ?>">Espace Pro</a></li>
                        <li><a href="<?php echo esc_url(home_url('/api')); ?>">API DÃ©veloppeurs</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> BESOIN.MA - Tous droits rÃ©servÃ©s. 
                   <span class="d-block d-md-inline">ConÃ§u avec <i class="bi bi-heart-fill text-danger"></i> au Maroc</span>
                </p>
            </div>
        </div>
    </footer>


    <!-- Custom JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));

        // Search bar interactions
        const searchBar = document.querySelector('.besoin-search-bar');
        if (searchBar) {
            const keywordItems = searchBar.querySelectorAll('.keywords-item');
            const locationItems = searchBar.querySelectorAll('.location-item');
            
            keywordItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    const value = item.dataset.value;
                    const label = item.textContent;
                    searchBar.querySelector('.keyword-label').textContent = label;
                    
                    // Update placeholder based on selection
                    const input = searchBar.querySelector('#search-input');
                    const placeholders = {
                        'service': 'Ex: Plombier, Designer, DÃ©veloppeur...',
                        'job': 'Ex: Marketing, Comptable, Chauffeur...',
                        'business': 'Ex: Restaurant, Agence, Boutique...'
                    };
                    input.placeholder = placeholders[value] || 'Que recherchez-vous ?';
                });
            });

            locationItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    const label = item.textContent.trim();
                    searchBar.querySelector('.location-label').textContent = label;
                });
            });
        }

        // Favorite toggle
        document.querySelectorAll('.listing-favorite').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');
                if (icon.classList.contains('bi-heart')) {
                    icon.classList.replace('bi-heart', 'bi-heart-fill');
                    this.style.background = 'var(--besoin-orange)';
                    this.style.color = 'white';
                } else {
                    icon.classList.replace('bi-heart-fill', 'bi-heart');
                    this.style.background = 'white';
                    this.style.color = 'inherit';
                }
            });
        });
    });
    </script>

    <?php wp_footer(); ?>
</body>
</html>
