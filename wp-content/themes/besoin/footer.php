<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Becoin
 */

?>

<section class="footer-section">
	<div class="container">
		<a href="#" class="footer-logo">
			<img src="<?php echo get_template_directory_uri(); ?>/images/logo.webp" alt="logo" class="img-fluid">
		</a>

		<div class="row footer-spacing">
			<div class="col-md-12 col-lg-4 mb-3">
				<h5 class="footer-head">Building great business stories.</h5>
				<a href="#" class="footer-para text-decoration-none">Effortlessly search, discover and match with
					top
					providers in 500+ services. Tell us your needs,
					and we'll introduce you to the right partner to
					help your business grow.</a>

			</div>
			<div class="col-md-3 col-lg-2 mb-3">
				<h5 class="footer-head">For clients</h5>
				<a href="#" class="footer-para text-decoration-none">Post a project</a>
				<a href="#" class="footer-para text-decoration-none">Explore</a>
				<a href="#" class="footer-para text-decoration-none">Get advice</a>
				<a href="#" class="footer-para text-decoration-none">Search</a>
			</div>
			<div class="col-md-3 col-lg-2 mb-3">
				<h5 class="footer-head">For providers</h5>
				<a href="#" class="footer-para text-decoration-none">How it works</a>
				<a href="#" class="footer-para text-decoration-none">Pricing</a>
				<a href="#" class="footer-para text-decoration-none">Get listed</a>
			</div>
			<div class="col-md-3 col-lg-2 mb-3">
				<h5 class="footer-head">Resources</h5>
				<a href="#" class="footer-para text-decoration-none">Blog</a>
				<a href="#" class="footer-para text-decoration-none">Data Hub</a>
				<a href="#" class="footer-para text-decoration-none">Help & Support</a>
			</div>
			<div class="col-md-3 col-lg-2">
				<h5 class="footer-head">Company</h5>
				<a href="#" class="footer-para text-decoration-none">About</a>
				<a href="#" class="footer-para text-decoration-none">Contact</a>
				<a href="#" class="footer-para text-decoration-none">Jobs</a>
			</div>
		</div>

		<div class="row mb-2">
			<div class="col-12">
				<div class="social-media-icon">
					<a href="#" class="footer-icon text-decoration-none">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon1.svg" alt="Twitter" class="img-fluid">
					</a>
					<a href="#" class="footer-icon text-decoration-none">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon2.svg" alt="Facebook" class="img-fluid">
					</a>
					<a href="#" class="footer-icon text-decoration-none">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon3.svg" alt="Linkedin" class="img-fluid">
					</a>
					<a href="#" class="footer-icon text-decoration-none">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon4.svg" alt="Instagram" class="img-fluid">
					</a>
					<a href="#" class="footer-icon text-decoration-none">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icon5.svg" alt="YouTube" class="img-fluid">
					</a>
				</div>
			</div>

		</div>
		<div class="row mb-2">
			<div class="col-md-6">
				<p class="copyrights-text">2023 © Sortlist - All rights reserved-Terms of Use - Privacy Policy</p>
			</div>
			<div class="col-md-6">
				<ul class="text-md-end ps-0 ms-0">
					<li class="nav-item dropdown list-unstyled ms-2">
						<a class="nav-link dropdown-toggle align-items-center d-inline-block language-dropdown"
							href="#" id="LanguageDropdown" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							<img src="<?php echo get_template_directory_uri(); ?>/images/language.svg" alt="language">
							Language
						</a>
						<ul class="dropdown-menu" aria-labelledby="LanguageDropdown">
							<li><a class="dropdown-item" href="#">English</a></li>
							<!-- <li><a class="dropdown-item" href="#">Language</a></li> -->
							<!-- <li><a class="dropdown-item" href="#">Language</a></li> -->
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
	$(document).ready(function() {
		var owl = $("#carouselVerification");

		owl.owlCarousel({
			loop: true,
			autoplay: true,
			center: false,
			margin: 10,
			nav: false,
			dots: false,
			stagePadding: 120,
			responsive: {
				0: {
					items: 1,
					stagePadding: 0
				},
				600: {
					items: 1,
					stagePadding: 30
				},
				768: {
					items: 2,
					stagePadding: 60
				},
				1360: {
					items: 4,
					stagePadding: 100
				}
			}
		});

		// Custom navigation buttons
		$(".left-arrow").click(function() {
			owl.trigger("prev.owl.carousel");
		});

		$(".right-arrow").click(function() {
			owl.trigger("next.owl.carousel");
		});
	});
</script>

<script>
	$(document).ready(function() {
		var owl = $("#carouselMoment");

		owl.owlCarousel({
			loop: true,
			center: true,
			margin: 15,
			responsiveClass: true,
			nav: true,
			dots: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				768: {
					items: 1.5,
					nav: false,
					loop: true
				},
				991: {
					items: 1.5,
					nav: false,
					loop: true
				},
				1024: {
					items: 2,
					nav: false,
					loop: true
				},
				1200: {
					items: 2,
					nav: false,
					loop: true
				},
				1360: {
					items: 3,
					nav: true
				}
			}
		});

		// Custom navigation buttons
		$(".offer-prev").click(function() {
			owl.trigger("prev.owl.carousel");
		});

		$(".offer-next").click(function() {
			owl.trigger("next.owl.carousel");
		});
	});
</script>


<script>
	$(function() {
		// Owl Carousel
		var owl = $("#carouselServices");
		owl.owlCarousel({
			items: 4,
			margin: 10,
			loop: true,
			nav: true,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				768: {
					items: 2,
					nav: false,
					loop: true
				},
				1000: {
					items: 3,
					nav: true
				},
				1360: {
					items: 4,
					nav: true
				}


			}
		});

		// Custom navigation buttons
		$(".ps-prev").click(function() {
			owl.trigger("prev.owl.carousel");
		});

		$(".ps-next").click(function() {
			owl.trigger("next.owl.carousel");
		});
	});
</script>

<script>
	$(function() {
		// Owl Carousel
		var owl = $("#carouselCategories");
		owl.owlCarousel({
			items: 4,
			margin: 15,
			loop: true,
			nav: true,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				768: {
					items: 2,
					nav: false,
					loop: true
				},
				1200: {
					items: 3,
					nav: false,
					loop: true
				},
				1360: {
					items: 4,
					nav: true
				}
			}
		});

		// Custom navigation buttons
		$(".cat-prev").click(function() {
			owl.trigger("prev.owl.carousel");
		});

		$(".cat-next").click(function() {
			owl.trigger("next.owl.carousel");
		});
	});
</script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>